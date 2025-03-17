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
use Modules\Core\Contracts\ActivityLogsContract;
use Modules\Core\Custom\ActivityLog\Traits\LogsActivity;
use Modules\GeoLocation\Traits\HasContinent;
use Modules\GeoLocation\Traits\HasName;
use Spatie\Activitylog\LogOptions;

class District extends Model implements ActivityLogsContract
{
    use HasContinent, HasName;
    use HasFactory;
    use LogsActivity;

    protected $table = 'geolocation_districts';

    protected $fillable = [
        'en_name',
        'ar_name',
        'code',
        'country_id',
        'governorate_id',
        'city_id',
        'continent',

        'continent',
        'latitude',
        'longitude',
        'will_sync',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('Districts')
            ->dontSubmitEmptyLogs()
            ->logFillable()
            ->setDescriptionForEvent(fn (string $eventName) => "District [ID: {$this->id}, Name: {$this->en_name}] has been {$eventName}")
            ->dontLogIfAttributesChangedOnly(['updated_at']);
    }

    public function getRecordLabel(): string
    {
        $trans = 'trans';

        return <<<Html
            <ul class="space-y-1">
                <li class="text-gray-500 font-bold text-xs">
                    {$trans('Type')}: {$trans('District')}
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
        return route('dashboard.geolocation.districts.edit', $this->id);
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function governorate(): BelongsTo
    {
        return $this->belongsTo(Governorate::class, 'governorate_id');
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function renderAsTableColumn(?string $locale = null): string
    {
        return <<<LABEL
                    <div class="flex gap-2">
                        <div class="bg-gray-200 w-10 h-10 rounded-full">
                            <img class="w-10 h-10 min-w-10 min-h-10 rounded-full p-1" src="{$this->country->getFlagUrl()}" alt="Flag"/>
                        </div>
                        <div>
                            <div class="text-sm font-semibold text-primary-600 dark:text-primary-400">{$this->country->getCommonName($locale)}</div>
                            <div class="text-xs text-gray-500 dark:text-gray-400">{$this->governorate?->getName($locale)}</div>
                            <div class="text-xs text-gray-500 dark:text-gray-400">{$this->city?->getName($locale)}</div>
                        </div>
                    </div>
                LABEL;
    }
}
