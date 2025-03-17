<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Services\Mail\Settings;

use Illuminate\Support\Facades\Config;
use Modules\Core\Entities\Setting;

class MailSettings
{
    public static function resetLaravelMailer(): void
    {
        (new \Illuminate\Mail\MailServiceProvider(app()))->register();
    }

    public static function setConfig(array $config): void
    {
        Config::set('mail.mailers.smtp', array_merge(config('mail.mailers.smtp'), $config));
        Config::set('mail.from', array_merge(config('mail.from'), $config));
    }

    public static function setCurrentTenantConfig(): void
    {
        $smtpArray = Setting::getArray('smtp_configs', config('mail.mailers.smtp'));
        Config::set('mail.mailers.smtp', array_merge(config('mail.mailers.smtp'), $smtpArray));
        Config::set('mail.from', array_merge(config('mail.from'), $smtpArray));
    }
}
