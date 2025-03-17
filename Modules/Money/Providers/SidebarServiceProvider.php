<?php

namespace Modules\Money\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Services\Sidebar\Sidebar;
use Modules\Core\Services\Sidebar\SidebarItem;

class SidebarServiceProvider extends ServiceProvider
{
    public function register() {}

    public function boot(Sidebar $sidebar)
    {
        $settingsSidebar = app('SettingsSidebar');

        $settingsSidebar
            ->addItem(
                new SidebarItem(
                    5,
                    ['dashboard.settings.money'],
                    'Money Settings',
                    'dashboard.settings.money',
                    asset('images/settings/money-setting.svg'),
                    false,
                    'Currency'
                )
            );
    }
}
