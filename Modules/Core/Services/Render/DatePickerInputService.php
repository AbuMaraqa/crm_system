<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Services\Render;

use Coolsam\FilamentFlatpickr\Forms\Components\Flatpickr;
use Illuminate\Support\Carbon;

class DatePickerInputService
{
    public static function make(string $name): Flatpickr
    {
        return Flatpickr::make($name)
            ->formatStateUsing(function (?string $state) {
                return $state ? Carbon::parse($state)->format('d/m/Y') : '';
            })
            ->dehydrateStateUsing(fn (string $state): string => Carbon::createFromFormat('d/m/Y', $state))
            ->autocomplete(false)
            ->animate()
            ->dateFormat('d/m/Y')
            ->allowInput();
    }
}
