<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 4/16/24, 11:21 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\GeoLocation\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Core\Contracts\ActivityLogsContract;
use Modules\Core\Custom\ActivityLog\Traits\LogsActivity;
use Modules\GeoLocation\Traits\HasContinent;
use Modules\GeoLocation\Traits\HasName;
use Spatie\Activitylog\LogOptions;

class Governorate extends Model implements ActivityLogsContract
{
    use HasContinent, HasName;
    use HasFactory;
    use LogsActivity;

    protected $table = 'geolocation_governorates';

    protected $fillable = [
        'en_name',
        'ar_name',
        'code',
        'country_id',
        'continent',
        'population',
        'latitude',
        'longitude',
        'will_sync',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('Governorates')
            ->dontSubmitEmptyLogs()
            ->logFillable()
            ->setDescriptionForEvent(fn (string $eventName) => "Governorate [ID: {$this->id}, Name: {$this->en_name}] has been {$eventName}")
            ->dontLogIfAttributesChangedOnly(['updated_at']);
    }

    public function getRecordLabel(): string
    {
        $trans = 'trans';

        return <<<Html
            <ul class="space-y-1">
                <li class="text-gray-500 font-bold text-xs">
                    {$trans('Type')}: {$trans('Governorate')}
                </li>
                <li class="text-gray-500 font-bold text-xs">
                    {$trans('ID')}: {$this->id}
                </li>
                <li>{$trans('Name')}: {$this->getName()}</li>
            </ul>
        Html;
    }

    public function getRecordUrl(): ?string
    {
        return route('dashboard.geolocation.governorates.edit', $this->id);
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function cities(): HasMany
    {
        return $this->hasMany(City::class, 'governorate_id');
    }

    public function districts(): HasMany
    {
        return $this->hasMany(District::class, 'governorate_id');
    }
}
