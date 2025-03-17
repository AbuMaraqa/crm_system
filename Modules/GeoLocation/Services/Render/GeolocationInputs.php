<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 4/16/24, 11:21 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\GeoLocation\Services\Render;

use Closure;
use Filament\Forms\Components\Select;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Modules\Core\Services\Settings\ApplicationSettings;
use Modules\GeoLocation\Entities\City;
use Modules\GeoLocation\Entities\Country;
use Modules\GeoLocation\Entities\District;
use Modules\GeoLocation\Entities\Governorate;

class GeolocationInputs
{
    protected Collection $columns;

    protected ?string $countryStatePath = null;

    protected ?string $governorateStatePath = null;

    protected ?string $cityStatePath = null;

    protected ?string $districtStatePath = null;

    public function __construct()
    {
        $this->columns = new Collection();
    }

    public static function make(): static
    {
        return new static();
    }

    public function country(
        string $name = 'country_id',
        string|Htmlable|Closure|null $label = 'Country',
        array|int|string|Closure|null $span = null,
        bool $required = false,
    ): static {

        $this->countryStatePath = $name;

        $this->columns->push(Select::make($name)
            ->label($label)
            ->columnSpan($span)
            ->default(function () {
                $applicationSettings = app(ApplicationSettings::class);

                $initialCountry = $applicationSettings->getValue('app_location_initial_country');
                $initialCountry = $initialCountry ? $initialCountry : 'PS';

                return Country::where('code', $initialCountry)->first()?->id;
            })
            ->options(
                function (Get $get, Set $set): array {

                    $countries = Country::take(50)->get();

                    $options = [];

                    foreach ($countries as $country) {
                        $options[$country->id] = $country->renderAsHTML();
                    }

                    return $options;
                }
            )
            ->getOptionLabelUsing(fn ($value): ?string => Country::find($value)?->renderAsHTML())
            ->getSearchResultsUsing(function ($search): array {

                $countries = Country::where(function ($query) use ($search) {
                    $query->where('ar_common_name', 'like', "%$search%")
                        ->orWhere('en_common_name', 'like', "%$search%");
                })
                    ->take(50)
                    ->get();

                $options = [];

                foreach ($countries as $country) {
                    $options[$country->id] = $country->renderAsHTML();
                }

                return $options;
            })
            ->allowHtml()
            ->searchable()
            ->required($required)
            ->exists(Country::class, 'id'));

        return $this;
    }

    public function governorate(
        string $name = 'governorate_id',
        string|Htmlable|Closure|null $label = 'Governorate',
        array|int|string|Closure|null $span = null,
        bool $required = false,
    ): static {

        $this->governorateStatePath = $name;

        $this->columns->push(
            Select::make($name)
                ->label($label)
                ->columnSpan($span)
                ->options(
                    function (Get $get): array {
                        $governorates = Governorate::when($this->countryStatePath, function (Builder $query) use ($get) {
                            $query->where('country_id', $get($this->countryStatePath));
                        })
                            ->take(50)
                            ->get();

                        $options = [];

                        foreach ($governorates as $governorate) {
                            $options[$governorate->id] = $governorate->getName();
                        }

                        return $options;
                    }
                )
                ->getOptionLabelUsing(fn ($value): ?string => Governorate::find($value)?->getName())
                ->getSearchResultsUsing(function (string $search, Get $get): array {

                    $governorates = Governorate::when($this->countryStatePath, function (Builder $query) use ($get) {
                        $query->where('country_id', $get($this->countryStatePath));
                    })->where(function ($query) use ($search) {
                        $query->where('ar_name', 'like', "%$search%")
                            ->orWhere('en_name', 'like', "%$search%");
                    })
                        ->take(50)
                        ->get();

                    $options = [];

                    foreach ($governorates as $governorate) {
                        $options[$governorate->id] = $governorate->getName();
                    }

                    return $options;
                })
                ->afterStateUpdated(function (Set $set, ?string $state) {

                    if ($this->cityStatePath) {
                        $set($this->cityStatePath, null);
                    }

                    if ($this->districtStatePath) {
                        $set($this->districtStatePath, null);
                    }
                })
                ->searchable()

                ->required($required)
                ->exists(Governorate::class, 'id')
        );

        return $this;
    }

    public function city(
        string $name = 'city_id',
        string|Htmlable|Closure|null $label = 'City',
        array|int|string|Closure|null $span = null,
        bool $required = false,

    ): static {
        $this->cityStatePath = $name;

        $this->columns->push(

            Select::make($name)
                ->label($label)
                ->columnSpan($span)
                ->options(
                    function (Get $get): array {
                        $cities = City::when($this->countryStatePath, function (Builder $query) use ($get) {
                            $query->where('country_id', $get($this->countryStatePath));
                        })
                            ->when($this->governorateStatePath && $get($this->governorateStatePath), function (Builder $query) use ($get) {
                                $query->where('governorate_id', $get($this->governorateStatePath));
                            })
                            ->take(50)
                            ->get();

                        $options = [];

                        foreach ($cities as $city) {
                            $options[$city->id] = $city->getName();
                        }

                        return $options;
                    }
                )
                ->getOptionLabelUsing(fn ($value): ?string => City::find($value)?->getName())
                ->getSearchResultsUsing(function (string $search, Get $get): array {

                    $cities = City::when($this->countryStatePath, function (Builder $query) use ($get) {
                        $query->where('country_id', $get($this->countryStatePath));
                    })
                        ->when($this->governorateStatePath && $get($this->governorateStatePath), function (Builder $query) use ($get) {
                            $query->where('governorate_id', $get($this->governorateStatePath));
                        })
                        ->where(function ($query) use ($search) {
                            $query->where('ar_name', 'like', "%$search%")
                                ->orWhere('en_name', 'like', "%$search%");
                        })
                        ->take(50)
                        ->get();

                    $options = [];

                    foreach ($cities as $city) {
                        $options[$city->id] = $city->getName();
                    }

                    return $options;
                })
                ->afterStateUpdated(function (Set $set, Get $get, ?string $state) {
                    if ($this->districtStatePath) {
                        $set($this->districtStatePath, null);
                    }
                })
                ->searchable()

                ->required($required)
                ->exists(City::class, 'id')

        );

        return $this;
    }

    public function district(
        string $name = 'district_id',
        string|Htmlable|Closure|null $label = 'District',
        array|int|string|Closure|null $span = null,
        bool $required = false,

    ): static {

        $this->districtStatePath = $name;

        $this->columns->push(

            Select::make($name)
                ->label($label)
                ->columnSpan($span)
                ->options(
                    function (Get $get): array {
                        $districts = District::when($this->countryStatePath, function (Builder $query) use ($get) {
                            $query->where('country_id', $get($this->countryStatePath));
                        })
                            ->when($this->governorateStatePath && $get($this->governorateStatePath), function (Builder $query) use ($get) {
                                $query->where('governorate_id', $get($this->governorateStatePath));
                            })
                            ->when($this->cityStatePath, function (Builder $query) use ($get) {

                                $query->where('city_id', $get($this->cityStatePath));
                            })
                            ->take(50)
                            ->get();

                        $options = [];

                        foreach ($districts as $district) {
                            $options[$district->id] = $district->getName();
                        }

                        return $options;
                    }
                )
                ->getOptionLabelUsing(fn ($value): ?string => District::find($value)?->getName())
                ->getSearchResultsUsing(function (string $search, Get $get): array {

                    $districts = District::when($this->countryStatePath, function (Builder $query) use ($get) {
                        $query->where('country_id', $get($this->countryStatePath));
                    })
                        ->when($this->governorateStatePath && $get($this->governorateStatePath), function (Builder $query) use ($get) {
                            $query->where('governorate_id', $get($this->governorateStatePath));
                        })
                        ->when($this->cityStatePath, function (Builder $query) use ($get) {
                            $query->where('city_id', $get($this->cityStatePath));
                        })
                        ->where(function ($query) use ($search) {
                            $query->where('ar_name', 'like', "%$search%")
                                ->orWhere('en_name', 'like', "%$search%");
                        })
                        ->take(50)
                        ->get();

                    $options = [];

                    foreach ($districts as $district) {
                        $options[$district->id] = $district->getName();
                    }

                    return $options;
                })
                ->searchable()

                ->required($required)
                ->exists(District::class, 'id')

        );

        return $this;
    }

    public function render(): array
    {
        return $this->columns->toArray();
    }
}
