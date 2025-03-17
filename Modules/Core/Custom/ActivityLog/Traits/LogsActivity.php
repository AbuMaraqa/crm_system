<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Custom\ActivityLog\Traits;

use Filament\Support\Contracts\HasLabel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Modules\Core\Casts\DateCast;
use Modules\Core\Custom\ActivityLog\Exceptions\InvalidRelation;
use Spatie\Activitylog\ActivityLogger;
use Spatie\Activitylog\ActivityLogStatus;
use Spatie\Activitylog\EventLogBag;
use Spatie\Activitylog\Traits\LogsActivity as SpatieLogsActivity;

trait LogsActivity
{
    use SpatieLogsActivity {
        eventsToBeRecorded as parentEventsToBeRecorded;
        shouldLogEvent as parentShouldLogEvent;
        attributeValuesToBeLogged as parentAttributeValuesToBeLogged;
    }

    protected bool $loggableIsBeingRestored = false;

    protected array $logRelationChanges = [];

    protected static function bootLogsActivity(): void
    {
        // Hook into eloquent events that only specified in $eventToBeRecorded array,
        // checking for "updated" event hook explicitly to temporary hold original
        // attributes on the model as we'll need them later to compare against.

        if (collect(class_uses_recursive(static::class))->contains(SoftDeletes::class)) {
            static::restoring(callback: function ($model) {
                $model->loggableIsBeingRestored = true;
            });
        }

        static::eventsToBeRecorded()->each(function ($eventName) {
            if ($eventName === 'updated') {
                static::updating(function (Model $model) {
                    $oldValues = (new static())->setRawAttributes($model->getRawOriginal());
                    $model->oldAttributes = static::logChanges($oldValues);
                });
            }

            static::$eventName(function (Model $model) use ($eventName) {
                $model->activitylogOptions = $model->getActivitylogOptions();

                if (! $model->shouldLogEvent($eventName)) {
                    return;
                }

                $changes = $model->attributeValuesToBeLogged($eventName);

                $description = $model->getDescriptionForEvent($eventName);

                $logName = $model->getLogNameToUse();

                // Submitting empty description will cause place holder replacer to fail.
                if ($description == '') {
                    return;
                }

                if ($model->isLogEmpty($changes) && ! $model->activitylogOptions->submitEmptyLogs) {
                    return;
                }

                // User can define a custom pipelines to mutate, add or remove from changes
                // each pipe receives the event carrier bag with changes and the model in
                // question every pipe should manipulate new and old attributes.
                $event = app(Pipeline::class)
                    ->send(new EventLogBag($eventName, $model, $changes, $model->activitylogOptions))
                    ->through(static::$changesPipes)
                    ->thenReturn();

                // Actual logging
                $logger = app(ActivityLogger::class)
                    ->useLog($logName)
                    ->event($eventName)
                    ->performedOn($model)
                    ->withProperties($event->changes);

                if (method_exists($model, 'tapActivity')) {
                    $logger->tap([$model, 'tapActivity'], $eventName);
                }

                $logger->log($description);

                // Reset log options so the model can be serialized.
                $model->activitylogOptions = null;
            });
        });
    }

    /**
     * Log the attachment of a related model.
     *
     * @param  mixed  $id
     * @param  bool  $touch
     * @param  array  $logColumns
     * @return void
     *
     * @throws InvalidRelation
     */
    public function logAttach(string $relationName, $id, array $attributes = [], $touch = true, $logColumns = ['*'])
    {
        // Check if the relationship and attach method exist
        if (! method_exists($this, $relationName) || ! method_exists($this->{$relationName}(), 'attach')) {
            throw new InvalidRelation('Relationship '.$relationName.' was not found or does not support method attach');
        }

        // Get the current state before syncing the related models
        $old = $this->{$relationName}()->get()->map(function ($item) use ($logColumns) {
            $data = [];
            foreach ($logColumns as $logColumn) {
                if ($logColumn === '*') {
                    return $item->toArray();
                }
                $data[$logColumn] = data_get($item, $logColumn, data_get($item, "pivot.$logColumn"));
            }

            return $data;
        });

        // Attach the new related model
        $this->{$relationName}()->attach($id, $attributes, $touch);

        // Get the updated state after attaching
        $new = $this->{$relationName}()->get()->map(function ($item) use ($logColumns) {
            $data = [];
            foreach ($logColumns as $logColumn) {
                if ($logColumn === '*') {
                    return $item->toArray();
                }
                $data[$logColumn] = data_get($item, $logColumn, data_get($item, "pivot.$logColumn"));
            }

            return $data;
        });

        // Dispatch the relation change event if there are differences
        if ($old->count() !== $new->count()) {
            // Dispatch the relation change event
            $this->dispatchRelationChanges($relationName, 'relationAttached', $old, $new);
        }
    }

    /**
     * Log the detachment of related models.
     *
     * @param  mixed  $ids
     * @param  bool  $touch
     * @param  array  $logColumns
     * @return int
     *
     * @throws InvalidRelation
     */
    public function logDetach(string $relationName, $ids = null, $touch = true, $logColumns = ['*'])
    {
        // Check if the relationship and detach method exist
        if (! method_exists($this, $relationName) || ! method_exists($this->{$relationName}(), 'detach')) {
            throw new InvalidRelation('Relationship '.$relationName.' was not found or does not support method detach');
        }

        // Get the current state before syncing the related models
        $old = $this->{$relationName}()->get()->map(function ($item) use ($logColumns) {
            $data = [];
            foreach ($logColumns as $logColumn) {
                if ($logColumn === '*') {
                    return $item->toArray();
                }
                $data[$logColumn] = data_get($item, $logColumn, data_get($item, "pivot.$logColumn"));
            }

            return $data;
        });

        // Detach the related models
        $results = $this->{$relationName}()->detach($ids, $touch);

        // Get the updated state after detaching
        $new = $this->{$relationName}()->get()->map(function ($item) use ($logColumns) {
            $data = [];
            foreach ($logColumns as $logColumn) {
                if ($logColumn === '*') {
                    return $item->toArray();
                }
                $data[$logColumn] = data_get($item, $logColumn, data_get($item, "pivot.$logColumn"));
            }

            return $data;
        });


        // Dispatch the relation change event if there are differences
        if (! empty($results)) {
            // Dispatch the relation change event
            $this->dispatchRelationChanges($relationName, 'relationDetached', $old, $new);
        }

        return empty($results) ? 0 : $results;
    }

    /**
     * Log the syncing of related models.
     *
     * @param  \Illuminate\Support\Collection|\Illuminate\Database\Eloquent\Model|array  $ids
     * @param  bool  $detaching
     * @param  array  $logColumns
     * @return array
     *
     * @throws InvalidRelation
     */
    public function logSync($relationName, $ids, $detaching = true, $logColumns = ['*'])
    {
        // Check if the relationship and sync method exist
        if (! method_exists($this, $relationName) || ! method_exists($this->{$relationName}(), 'sync')) {
            throw new InvalidRelation('Relationship '.$relationName.' was not found or does not support method sync');
        }

        // Get the current state before syncing the related models
        $old = $this->{$relationName}()->get()->map(function ($item) use ($logColumns) {
            $data = [];
            foreach ($logColumns as $logColumn) {
                if ($logColumn === '*') {
                    return $item->toArray();
                }
                $data[$logColumn] = data_get($item, $logColumn, data_get($item, "pivot.$logColumn"));
            }

            return $data;
        });

        // Perform the sync operation
        $changes = $this->{$relationName}()->sync($ids, $detaching);

        // Determine old and new states based on changes
        if (collect($changes)->flatten()->isEmpty()) {
            $old = $new = collect([]);
        } else {
            $new = $this->{$relationName}()->get()->map(function ($item) use ($logColumns) {
                $data = [];
                foreach ($logColumns as $logColumn) {
                    if ($logColumn === '*') {
                        return $item->toArray();
                    }
                    $data[$logColumn] = data_get($item, $logColumn, data_get($item, "pivot.$logColumn"));
                }

                return $data;
            });
        }

        // Dispatch the relation change event if there are differences
        if ($old->count() > 0 || $new->count() > 0) {
            $this->dispatchRelationChanges($relationName, 'relationSynced', $old, $new);
        }

        return $changes;
    }

    /**
     * Log the syncing of related models without detaching.
     *
     * @param  \Illuminate\Support\Collection|\Illuminate\Database\Eloquent\Model|array  $ids
     * @param  array  $logColumns
     * @return array
     *
     * @throws InvalidRelation
     */
    public function logSyncWithoutDetaching(string $relationName, $ids, $logColumns = ['*'])
    {
        // Check if the relationship and syncWithoutDetaching method exist
        if (! method_exists($this, $relationName) || ! method_exists($this->{$relationName}(), 'syncWithoutDetaching')) {
            throw new InvalidRelation('Relationship '.$relationName.' was not found or does not support method syncWithoutDetaching');
        }

        return $this->logSync($relationName, $ids, false, $logColumns);
    }

    /**
     * Log the syncing of related models.
     *
     * @throws InvalidRelation
     */
    public function syncOneToMany(string $relationName, Collection|array $data, bool $seachByAttributes = true, bool $detaching = true, array $logColumns = ['*']): array
    {
        // Check if the relationship and sync method exist
        if (! method_exists($this, $relationName)) {
            throw new InvalidRelation('Relationship '.$relationName.' was not found');
        }

        $created = [];
        $updated = [];
        $deleted = [];
        $relatedKeyName = $this->{$relationName}()->getRelated()->getKeyName();

        // Get the current state before syncing the related models
        $oldModels = $this->{$relationName}()->get();

        $old = $oldModels
            ->map(function ($model) use ($logColumns) {
                return $this->getAttributesArray($model, $logColumns);
            });

        $new = collect();

        foreach ($data as $attributes) {

            $model = null;

            if ($seachByAttributes) {
                $model = $oldModels->first(function ($item) use ($attributes) {
                    return $item->only(array_keys($attributes)) == $attributes;
                });
            }

            if (is_null($model) && isset($attributes[$relatedKeyName]) && filled($attributes[$relatedKeyName])) {
                $model = $oldModels->firstWhere($relatedKeyName, $attributes[$relatedKeyName]);
            }

            if (is_null($model)) {
                $model = $this->{$relationName}()->create($attributes);
                $created[] = $model->{$relatedKeyName};
            } else {
                $model->fill($attributes);
                if ($model->isDirty()) {
                    $model->save();
                    $updated[] = $model->getKey();
                }
            }

            $new->push($model);
        }

        if (! $detaching) {
            $oldModels = $oldModels->reject(function ($oldModel) use ($relatedKeyName, $new) {
                return (bool) $new->firstWhere($relatedKeyName, $oldModel->{$relatedKeyName});
            });

            foreach ($oldModels as $oldModel) {
                $new->push($oldModel);
            }
        }

        if ($detaching) {
            $all = $this->{$relationName}()->get();

            foreach ($all as $model) {
                if (! (bool) $new->firstWhere($relatedKeyName, $model->{$relatedKeyName})) {
                    $deleted[] = $model->{$relatedKeyName};
                    $model->delete();
                }
            }
        }

        // $all = $this->{$relationName}()->delete();
        // foreach ($new as $model) {
        //     $this->{$relationName}()->create(collect($model->attributesToArray())->except('id')->toArray());
        // }

        $changes = [
            'created' => $created,
            'deleted' => $deleted,
            'updated' => $updated,
        ];

        // Dispatch the relation change event if there are differences
        if (filled($created) || filled($deleted) || filled($updated)) {
            $this->dispatchRelationChanges(
                $relationName,
                'relationSynced',
                $old,
                $new->sortBy($relatedKeyName)->map(function ($model) use ($logColumns) {
                    return $this->getAttributesArray($model, $logColumns);
                })
            );
        }

        return $changes;
    }

    /**
     * Log the syncing of related model.
     *
     * @throws InvalidRelation
     */
    public function syncOneToOne(string $relationName, Collection|array $attributes, array $logColumns = ['*']): array
    {
        // Check if the relationship and sync method exist
        if (! method_exists($this, $relationName)) {
            throw new InvalidRelation('Relationship '.$relationName.' was not found');
        }

        $columns = $this->{$relationName}()->getRelated()->getFillable();
        // $columns = Schema::getColumnListing($tableName);

        if ($logColumns === ['*']) {
            $logColumns = $columns;
        }

        $created = [];
        $updated = [];
        $deleted = [];
        $relatedKeyName = $this->{$relationName}()->getRelated()->getKeyName();

        $oldModel = $this->{$relationName}()->first();

        $old = [];

        if ($oldModel) {

            $old = $this->getAttributesArray($oldModel, $logColumns);

            $model = null;

            if (isset($attributes[$relatedKeyName]) && filled($attributes[$relatedKeyName]) && $oldModel->{$relatedKeyName} === $attributes[$relatedKeyName]) {
                $model = $oldModel;
            }

            if (is_null($model) && $oldModel->only(array_keys($attributes)) == $attributes) {
                $model = $oldModel;
            }

            if (is_null($model)) {

                if ($oldModel) {
                    $deleted[] = $oldModel->{$relatedKeyName};
                    $oldModel->delete();
                }

                $model = $this->{$relationName}()->create($attributes);
                $created[] = $model->{$relatedKeyName};
            } else {
                $model->fill($attributes);
                if ($model->isDirty()) {
                    $model->save();
                    $updated[] = $model->getKey();
                }
            }
        } else {
            $model = $this->{$relationName}()->create($attributes);
            $created[] = $model->{$relatedKeyName};
        }

        $changes = [
            'created' => $created,
            'deleted' => $deleted,
            'updated' => $updated,
        ];

        // Dispatch the relation change event if there are differences
        if (filled($created) || filled($deleted) || filled($updated)) {
            $this->dispatchRelationChanges(
                $relationName,
                'relationSynced',
                collect($old),
                collect($this->getAttributesArray($model, $logColumns))
            );
        }

        return $changes;
    }

    public function getAttributesArray(Model $model, array $attributes): array
    {
        $changes = [];

        foreach ($attributes as $attribute) {
            if (Str::contains($attribute, '.')) {
                $changes += self::getRelatedModelAttributeValue($model, $attribute);

                continue;
            }

            if (Str::contains($attribute, '->')) {
                Arr::set(
                    $changes,
                    str_replace('->', '.', $attribute),
                    static::getModelAttributeJsonValue($model, $attribute)
                );

                continue;
            }

            $changes[$attribute] = $model->getAttribute($attribute);

            if (is_null($changes[$attribute])) {
                continue;
            }

            if ($model->isDateAttribute($attribute)) {
                $changes[$attribute] = $model->serializeDate(
                    $model->asDateTime($changes[$attribute])
                );
            }

            if ($model->hasCast($attribute)) {
                $cast = $model->getCasts()[$attribute];

                if ($model->isEnumCastable($attribute)) {
                    if ($changes[$attribute] instanceof HasLabel) {
                        $changes[$attribute] = $changes[$attribute]->getLabel();
                    } else {
                        try {
                            $changes[$attribute] = $model->getStorableEnumValue($changes[$attribute]);
                        } catch (\ArgumentCountError $e) {
                            // In Laravel 11, this method has an extra argument
                            // https://github.com/laravel/framework/pull/47465
                            $changes[$attribute] = $model->getStorableEnumValue($cast, $changes[$attribute]);
                        }
                    }
                }

                if ($model->isCustomDateTimeCast($cast) || $model->isImmutableCustomDateTimeCast($cast)) {
                    $changes[$attribute] = $model->asDateTime($changes[$attribute])->format(explode(':', $cast, 2)[1]);
                }

                if ($cast === DateCast::class) {
                    $changes[$attribute] = $model->asDateTime($changes[$attribute])->format('Y-m-d');
                }

                if ($cast === 'boolean') {
                    $changes[$attribute] = $changes[$attribute] ? 'True' : 'False';
                }
            }
        }

        return $changes;
    }

    /**
     * Dispatch the changes made to a related model.
     *
     * @param  string  $relationName
     * @param  string  $eventName
     * @param  Collection  $old
     * @param  Collection  $new
     * @return void
     */
    protected function dispatchRelationChanges($relationName, $eventName, $old, $new)
    {
        // Store the changes for logging purposes
        $this->logRelationChanges = [
            'old' => [
                $relationName => $old->toArray(),
            ],
            'attributes' => [
                $relationName => $new->toArray(),
            ],
        ];

        // Fire the model event to notify listeners about the relation change
        $this->fireModelEvent($eventName);

        // Clear the changes to avoid interference with subsequent events
        $this->logRelationChanges = [];
    }

    /**
     * Determine if the specified event should be logged.
     */
    protected function shouldLogEvent(string $eventName): bool
    {
        if (
            $eventName === 'updated' &&
            isset($this->loggableIsBeingRestored) &&
            $this->loggableIsBeingRestored
        ) {
            // This is a restored event so don't log!
            return false;
        }

        if ($eventName === 'restored') {
            $this->loggableIsBeingRestored = false;
        }

        // Check the global activity log status and model-specific logging settings
        $logStatus = app(ActivityLogStatus::class);

        if (! $this->enableLoggingModelsEvents || $logStatus->disabled()) {
            return false;
        }

        // Log only relation events, delegate other events to parent method
        if (! in_array($eventName, ['relationAttached', 'relationDetached', 'relationSynced'])) {
            return true;
        }

        return $this->parentShouldLogEvent($eventName);
    }

    /**
     * Get the values to be logged based on the specified event.
     */
    public function attributeValuesToBeLogged(string $processingEvent): array
    {
        // Return relation changes for specific events, delegate others to parent method
        if (in_array($processingEvent, ['relationAttached', 'relationDetached', 'relationSynced'])) {
            return $this->logRelationChanges;
        }

        return $this->parentAttributeValuesToBeLogged($processingEvent);
    }

    /**
     * Get the events that should be recorded, including custom relation events.
     */
    protected static function eventsToBeRecorded(): Collection
    {
        // Include parent events and custom relation events
        return self::parentEventsToBeRecorded()->concat(['relationAttached', 'relationDetached', 'relationSynced']);
    }

    /**
     * Register a model event for when a related model is attached.
     *
     * @param  \Illuminate\Events\QueuedClosure|\Closure|string|array  $callback
     * @return void
     */
    public static function relationAttached($callback)
    {
        static::registerModelEvent('relationAttached', $callback);
    }

    /**
     * Register a model event for when a related model is detached.
     *
     * @param  \Illuminate\Events\QueuedClosure|\Closure|string|array  $callback
     * @return void
     */
    public static function relationDetached($callback)
    {
        static::registerModelEvent('relationDetached', $callback);
    }

    /**
     * Register a model event for when a related model is synced.
     *
     * @param  \Illuminate\Events\QueuedClosure|\Closure|string|array  $callback
     * @return void
     */
    public static function relationSynced($callback)
    {
        static::registerModelEvent('relationSynced', $callback);
    }

    public static function logChanges(Model $model): array
    {
        $changes = [];
        $attributes = $model->attributesToBeLogged();

        foreach ($attributes as $key => $attribute) {

            if (is_string($key)) {

                if (Str::contains($key, '.')) {
                    $changes += self::getRelatedModelAttributeValue($model, $key, $attribute);

                    continue;
                }
            }

            if (Str::contains($attribute, '.')) {
                $changes += self::getRelatedModelAttributeValue($model, $attribute);

                continue;
            }

            if (Str::contains($attribute, '->')) {
                Arr::set(
                    $changes,
                    str_replace('->', '.', $attribute),
                    static::getModelAttributeJsonValue($model, $attribute)
                );

                continue;
            }

            $changes[$attribute] = in_array($attribute, $model->activitylogOptions->attributeRawValues)
                ? $model->getAttributeFromArray($attribute)
                : $model->getAttribute($attribute);

            if (is_null($changes[$attribute])) {
                continue;
            }

            if ($model->isDateAttribute($attribute)) {
                $changes[$attribute] = $model->serializeDate(
                    $model->asDateTime($changes[$attribute])
                );
            }

            if ($model->hasCast($attribute)) {
                $cast = $model->getCasts()[$attribute];

                if ($model->isEnumCastable($attribute)) {
                    if ($changes[$attribute] instanceof HasLabel) {
                        $changes[$attribute] = $changes[$attribute]->getLabel();
                    } else {
                        try {
                            $changes[$attribute] = $model->getStorableEnumValue($changes[$attribute]);
                        } catch (\ArgumentCountError $e) {
                            // In Laravel 11, this method has an extra argument
                            // https://github.com/laravel/framework/pull/47465
                            $changes[$attribute] = $model->getStorableEnumValue($cast, $changes[$attribute]);
                        }
                    }
                }

                if ($model->isCustomDateTimeCast($cast) || $model->isImmutableCustomDateTimeCast($cast)) {
                    $changes[$attribute] = $model->asDateTime($changes[$attribute])->format(explode(':', $cast, 2)[1]);
                }

                if ($cast === DateCast::class) {
                    $changes[$attribute] = $model->asDateTime($changes[$attribute])->format('Y-m-d');
                }

                if ($cast === 'boolean') {
                    $changes[$attribute] = $changes[$attribute] ? 'True' : 'False';
                }
            }
        }

        return $changes;
    }

    protected static function getRelatedModelAttributeValue(Model $model, string $attribute, ?string $method = null): array
    {
        $relatedModelNames = explode('.', $attribute);
        $relatedAttribute = array_pop($relatedModelNames);

        $attributeName = [];
        $relatedModel = $model;

        do {
            $attributeName[] = $relatedModelName = static::getRelatedModelRelationName($relatedModel, array_shift($relatedModelNames));

            $relatedModel = $relatedModel->$relatedModelName ?? $relatedModel->$relatedModelName();
        } while (! empty($relatedModelNames));

        $attributeName[] = $relatedAttribute;

        if (is_null($method)) {
            return [implode('.', $attributeName) => $relatedModel->$relatedAttribute ?? null];
        }

        if ($relatedModel instanceof Model) {
            return [implode('.', $attributeName) => $relatedModel?->{$method}() ?? null];
        }

        return [implode('.', $attributeName) => null];
    }
}
