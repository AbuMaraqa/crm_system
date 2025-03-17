<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Filament\Forms\Components;

use Carbon\CarbonInterface;
use Carbon\Exceptions\InvalidFormatException;
use Illuminate\Support\Carbon;
use TareqAlqadi\FilamentFlatpickr\Enums\FlatpickrMode;
use TareqAlqadi\FilamentFlatpickr\Enums\FlatpickrTheme;
use TareqAlqadi\FilamentFlatpickr\Forms\Components\Flatpickr as ComponentsFlatpickr;

class Flatpickr extends ComponentsFlatpickr
{
    protected string $view = 'core::components.filament.forms.components.flatpickr';

    protected function setUp(): void
    {
        parent::setUp();
        $this->prefixIcon('heroicon-o-calendar-days');
        $this->prevArrow('<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                </svg>');

        $this->nextArrow('<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="">
              <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
            </svg>');

        $this->theme(FlatpickrTheme::MATERIAL_BLUE);

        $this->dehydrateStateUsing(static function (Flatpickr $component, $state) {
            return static::dehydratePickerState($component, $state);
        });

        $this->afterStateHydrated(static function (Flatpickr $component, $state): void {
            if (blank($state)) {
                return;
            }

            if (! $state instanceof CarbonInterface) {
                try {
                    $state = Carbon::createFromFormat($component->getDateFormat(), $state, config('app.timezone'));
                } catch (InvalidFormatException $exception) {
                    try {
                        $state = Carbon::parse($state, config('app.timezone'));
                    } catch (InvalidFormatException $exception) {
                        $component->state(null);

                        return;
                    }
                }
            }
            $component->getConfig();

            $component->state($state->format($component->getDateFormat()));
        });

        /*$this->rule(
            'date',
            static fn(Flatpickr $component): bool => (!$component->isRangePicker() && !$component->isMultiplePicker() && !$component->isWeekSelect()),
        );*/
    }

    public static function dehydratePickerState($component, $state)
    {
        $component->getConfig();

        if (blank($state)) {
            return null;
        }

        if (! $state instanceof CarbonInterface) {
            if ($component->isMonthSelect()) {
                try {
                    $state = Carbon::createFromFormat($component->getDateFormat(), $state)->setDay(1);
                } catch (InvalidFormatException $exception) {
                    try {
                        $state = Carbon::parse($state, config('app.timezone'))->setDay(1);
                    } catch (InvalidFormatException $exception) {
                        $component->state(null);

                        return;
                    }
                }
            } elseif ($component->getMode() === FlatpickrMode::TIME->value) {
            } elseif ($component->getMode() === FlatpickrMode::SINGLE->value) {
                try {
                    $state = Carbon::createFromFormat($component->getDateFormat(), $state);
                } catch (InvalidFormatException $exception) {
                    try {
                        $state = Carbon::parse($state, config('app.timezone'));
                    } catch (InvalidFormatException $exception) {
                        $component->state(null);

                        return;
                    }
                }
            } elseif ($component->getMode() === FlatpickrMode::RANGE->value) {

                $state = collect($state)->map(fn ($date) => Carbon::createFromFormat($component->getDateFormat(), $date)
                    ->setTimezone(config('app.timezone')))
                    ->toArray();

            } elseif ($component->getMode() === FlatpickrMode::MULTIPLE->value) {

                $state = collect($state)->map(fn ($date) => Carbon::createFromFormat($component->getDateFormat(), $date)
                    ->setTimezone(config('app.timezone')))
                    ->toArray();
            }
        }

        return $state;
    }

    public function isSinglePicker(): bool
    {
        return $this->mode === FlatpickrMode::SINGLE;
    }
}
