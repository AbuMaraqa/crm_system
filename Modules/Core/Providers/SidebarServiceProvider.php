<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/23/24, 9:35 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Providers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use Modules\Core\Services\Sidebar\Sidebar;
use Modules\Core\Services\Sidebar\SidebarGroup;
use Modules\Core\Services\Sidebar\SidebarItem;
use Modules\Core\Services\Sidebar\SidebarSection;

class SidebarServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(Sidebar::class, function (Application $app) {
            return new Sidebar('DashboardSidebar');
        });

        $this->app->singleton('SettingsSidebar', function (Application $app) {
            return new Sidebar('SettingsSidebar');
        });
    }

    public function boot()
    {

        $sidebar = app(Sidebar::class);

        $userManagementGroup = new SidebarGroup(2, [
            'dashboard.user_management.roles',
            'dashboard.user_management.users',
        ], 'Users Management', 'iconsax-bul-profile-2user');

        $userManagementGroup
            ->addItem(new SidebarItem(1, ['dashboard.user_management.users'], 'Users', 'dashboard.user_management.users', 'iconsax-bul-user'))
            ->addItem(new SidebarItem(2, ['dashboard.user_management.roles'], 'Roles', 'dashboard.user_management.roles', 'iconsax-bul-shield-tick'))
            ->addItem(new SidebarItem(3, ['dashboard.user_management.activity_logs'], 'Activity Logs', 'dashboard.user_management.activity_logs', 'iconsax-bul-clock-1'));


        $sidebar
            ->addItem(new SidebarItem(1, ['dashboard.access'], 'Home', 'dashboard.home', 'iconsax-bul-home-hashtag'))
            ->addItem($userManagementGroup);




        $settingsSidebar = app('SettingsSidebar');

        $sidebarItem = 1;

        $settingsSidebar
            ->addItem(
                new SidebarItem(
                    $sidebarItem++,
                    ['dashboard.settings.general'],
                    'General Settings',
                    'dashboard.settings.general',
                    asset('images/settings/dashboard-setting.svg'),
                    false,
                    'Application Name - Logo - Favicon'
                )
            )
            ->addItem(
                new SidebarItem(
                    $sidebarItem++,
                    ['dashboard.settings.maintenance'],
                    'Maintenance Settings',
                    'dashboard.settings.maintenance',
                    asset('images/settings/maintenance-setting.svg'),
                    false,
                    'Maintenance Mode - Message - Start Date - End Date'
                )
            )
            ->addItem(
                new SidebarItem(
                    $sidebarItem++,
                    ['dashboard.settings.datetime'],
                    'Date Time Settings',
                    'dashboard.settings.datetime',
                    asset('images/settings/datetime-setting.svg'),
                    false,
                    'Time Zone - Date Format - Time Format'
                )
            )
            ->addItem(
                new SidebarItem(
                    $sidebarItem++,
                    ['dashboard.settings.smtp'],
                    'SMTP Settings',
                    'dashboard.settings.smtp',
                    asset('images/settings/mail-setting.svg'),
                    false,
                    'SMTP Host - SMTP Port - SMTP Username - SMTP Password - SMTP Encryption'
                )
            )
            ->addItem(
                new SidebarItem(
                    $sidebarItem++,
                    ['dashboard.settings.notification'],
                    'Notification Settings',
                    'dashboard.settings.notification',
                    asset('images/settings/notification-setting.svg'),
                    false,
                    'Notifications Displayed Count - Multiple Pages - Auto Update - Update Notifications Automatically Every'
                )
            )
            ->addItem(
                new SidebarItem(
                    $sidebarItem++,
                    ['dashboard.settings.google_recaptcha'],
                    'Google ReCaptcha Settings',
                    'dashboard.settings.google_recaptcha',
                    asset('images/settings/google-recaptcha-setting.svg'),
                    false,
                    'Site Key - Secret Key - Enable/Disable'
                )
            )
            ->addItem(
                new SidebarItem(
                    $sidebarItem++,
                    ['dashboard.settings.contact'],
                    'Contact Settings',
                    'dashboard.settings.contact',
                    asset('images/settings/contacts.png'),
                    false,
                    'Site Key - Secret Key - Enable/Disable'
                )
            );
    }
}
