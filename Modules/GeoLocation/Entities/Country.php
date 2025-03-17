<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 7/20/24, 3:16 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\GeoLocation\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;
use Modules\Core\Contracts\ActivityLogsContract;
use Modules\Core\Custom\ActivityLog\Traits\LogsActivity;
use Modules\Core\Services\Localization\Localization;
use Modules\GeoLocation\Traits\HasContinent;
use Spatie\Activitylog\LogOptions;

class Country extends Model implements ActivityLogsContract
{
    use HasContinent;
    use HasFactory;
    use LogsActivity;

    protected $table = 'geolocation_countries';

    protected $fillable = [
        'en_common_name',
        'en_official_name',
        'ar_common_name',
        'ar_official_name',
        'native_common_name',
        'native_official_name',
        'native_lang_code',
        'top_level_domine',
        'code',
        'code_ccn3',
        'code_cca3',
        'code_cioc',
        'phone_code',
        'independent',
        'currency_code',
        'capital_id',
        'continent',
        'latitude',
        'longitude',
        'area',
        'flag_image',
        'population',
        'start_of_week',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('Countries')
            ->dontSubmitEmptyLogs()
            ->logFillable()
            ->setDescriptionForEvent(fn(string $eventName) => "Country [ID: {$this->id}, Name: {$this->en_common_name}] has been {$eventName}")
            ->dontLogIfAttributesChangedOnly(['updated_at']);
    }

    public function getRecordLabel(): string
    {
        $trans = 'trans';

        return <<<Html
            <ul class="space-y-1">
                <li class="text-gray-500 font-bold text-xs">
                    {$trans('Type')}: {$trans('Country')}
                </li>
                <li class="text-gray-500 font-bold text-xs">
                    {$trans('ID')}: {$this->id}
                </li>
                <li>{$trans('Name')}: {$this->getCommonName()}</li>
            </ul>
        Html;
    }

    public function getRecordUrl(): ?string
    {
        return route('dashboard.geolocation.countries.edit', $this->id);
    }

    public function getFlagUrl(): string
    {
        $code = strtolower($this->code);

        return asset("images/flags/{$code}.svg");
    }

    public function renderAsTableColumn(?string $locale = null, bool $isColored = true): string
    {
        $color = 'text-primary-600 dark:text-primary-400';
        if (!$isColored) {
            $color = 'text-gray-600 dark:text-gray-400';
        }

        return <<<LABEL
                    <div class="flex gap-2">
                        <div class="bg-gray-200 w-10 h-10 rounded-full">
                            <img class="w-10 h-10 min-w-10 min-h-10 rounded-full p-1" src="{$this->getFlagUrl()}" alt="Flag"/>
                        </div>
                        <div>
                            <div class="text-sm font-semibold $color">{$this->getCommonName($locale)}</div>
                            <div class="text-xs text-gray-500 dark:text-gray-400">{$this->getOfficialName($locale)}</div>
                        </div>
                    </div>
                LABEL;
    }

    public function renderAsHTML(?string $locale = null): string
    {
        return <<<LABEL
                    <div class="relative">
                        <img class="absolute w-6 h-6 rounded-full" src="{$this->getFlagUrl()}"/>
                        <span class="mx-8">
                            {$this->getCommonName($locale)}
                        </span>
                    </div>
                LABEL;
    }

    public function renderPhoneCodeAsHTML(?string $locale = null): string
    {
        return <<<LABEL
                    <div class="relative">
                        <img class="absolute w-6 h-6 rounded-full" src="{$this->getFlagUrl()}"/>
                        <span class="mx-8 flex items-center gap-2">
                            ({$this->phone_code})
                            {$this->getCommonName($locale)}
                        </span>
                    </div>
                LABEL;
    }

    public function getCommonName(?string $locale = null): string
    {
        if (!$locale) {
            $locale = Localization::getCurrentLocale();
        }

        $commonName = $this->getAttribute($locale . '_common_name');

        if (!$commonName) {
            $commonName = $this->getAttribute('en_common_name');
        }

        return $commonName;
    }

    public function getOfficialName(?string $locale = null): string
    {
        if (!$locale) {
            $locale = Localization::getCurrentLocale();
        }

        $official_name = $this->getAttribute($locale . '_official_name');
        if (!$official_name) {
            $official_name = $this->getAttribute('en_official_name');
        }

        return $official_name;
    }

    public function capitalCity(): HasOne
    {
        return $this->hasOne(City::class, 'id', 'capital_id');
    }

    public function governorates(): HasMany
    {
        return $this->hasMany(Governorate::class, 'country_id');
    }

    public function cities(): HasMany
    {
        return $this->hasMany(City::class, 'country_id');
    }

    public function districts(): HasMany
    {
        return $this->hasMany(District::class, 'country_id');
    }
}
