<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Services\Render;

use Modules\Core\Services\Settings\ApplicationSettings;
use Ysfkaya\FilamentPhoneInput\Forms\PhoneInput;

class PhoneInputService
{
    public static function make(string $name): PhoneInput
    {
        $applicationSettings = app(ApplicationSettings::class);

        $initialCountry = $applicationSettings->getValue('app_phone_initial_country');

        $initialCountry = $initialCountry ? $initialCountry : 'PS';

        return PhoneInput::make($name)
            ->initialCountry($initialCountry)
            ->rule('phone');
    }
}
