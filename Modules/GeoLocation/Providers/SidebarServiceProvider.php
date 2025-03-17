<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 7/19/24, 7:10 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\GeoLocation\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Services\Sidebar\Sidebar;
use Modules\Core\Services\Sidebar\SidebarGroup;
use Modules\Core\Services\Sidebar\SidebarItem;

class SidebarServiceProvider extends ServiceProvider
{
    public function register() {}

    public function boot(Sidebar $sidebar)
    {

        $geoLocationGroup = new SidebarGroup(10, ['access_countries', 'access_governorates', 'access_cities', 'access_districts'], 'Geo Location', 'iconsax-bul-location');
        $geoLocationGroup
            ->addItem(new SidebarItem(1, ['access_countries'], 'Countries', 'dashboard.geolocation.countries', 'iconsax-bul-flag'))
            ->addItem(new SidebarItem(2, ['access_governorates'], 'Governorates', 'dashboard.geolocation.governorates', 'iconsax-bul-map'))
            ->addItem(new SidebarItem(3, ['access_cities'], 'Cities', 'dashboard.geolocation.cities', 'iconsax-bul-routing'))
            ->addItem(new SidebarItem(4, ['access_districts'], 'Districts', 'dashboard.geolocation.districts', 'iconsax-bul-location-tick'));

        $sidebar
            ->addItem($geoLocationGroup);

        $settingsSidebar = app('SettingsSidebar');

        $settingsSidebar
            ->addItem(
                new SidebarItem(
                    4,
                    ['access_geolocation_settings'],
                    'Geolocation Settings',
                    'dashboard.settings.geolocation',
                    asset('images/settings/geolocation-setting.svg'),
                    false,
                    'Phone Initial Country - Location Initial Country'
                )
            );
    }
}
