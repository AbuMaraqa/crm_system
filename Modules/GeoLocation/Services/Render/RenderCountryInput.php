<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 2/18/24, 9:59 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\GeoLocation\Services\Render;

use Closure;
use Filament\Forms\Components\Select;
use Filament\Forms\Get;
use Illuminate\Contracts\Support\Htmlable;
use Modules\GeoLocation\Entities\Country;

class RenderCountryInput
{
    protected Select $country;

    protected ?string $countryStatePath = null;

    public static function make(): static
    {
        return new static();
    }

    public function country(
        string $name = 'phone_code_id',
        string|Htmlable|Closure|null $label = 'Phone Code',
        array|int|string|Closure|null $span = null,
        bool $required = false,
    ): static {

        $this->country = Select::make($name)
            ->label($label)
            ->columnSpan($span)
            ->options(
                function (Get $get): array {
                    $countries = Country::all();

                    $options = [];

                    foreach ($countries as $country) {
                        $options[$country->phone_code] = $country->renderPhoneCodeAsHTML();
                    }

                    return $options;
                }
            )
            ->getSearchResultsUsing(function ($search): array {

                $countries = Country::where(function ($query) use ($search) {
                    $query->where('ar_common_name', 'like', "%$search%")
                        ->orWhere('en_common_name', 'like', "%$search%");
                })
                    ->take(50)
                    ->get();

                $options = [];

                foreach ($countries as $country) {
                    $options[$country->phone_code] = $country->renderPhoneCodeAsHTML();
                }

                return $options;
            })
            ->allowHtml()
            ->searchable()
            ->preload()
            ->required($required)
            ->in(Country::pluck('id'));

        return $this;
    }

    public function render(): Select
    {
        return $this->country;
    }
}
