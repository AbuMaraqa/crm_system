<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Traits;

use Modules\Core\Services\Settings\SettingRegistrar;

trait RefreshesSettingCache
{
    public static function bootRefreshesSettingCache()
    {
        static::saved(function () {
            app(SettingRegistrar::class)->forgetCachedSettings();
        });

        static::deleted(function () {
            app(SettingRegistrar::class)->forgetCachedSettings();
        });
    }
}
