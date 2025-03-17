<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 2/18/24, 9:59 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\GeoLocation\Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $permissionsNames = [
            //Countries Permissions
            [
                'module' => 'Geolocation',
                'group' => 'Countries',
                'label' => 'Create Country',
                'name' => 'create_country',
            ],
            [
                'module' => 'Geolocation',
                'group' => 'Countries',
                'label' => 'Edit Country',
                'name' => 'edit_country',
            ],
            [
                'module' => 'Geolocation',
                'group' => 'Countries',
                'label' => 'Delete Country',
                'name' => 'delete_country',
            ],
            [
                'module' => 'Geolocation',
                'group' => 'Countries',
                'label' => 'Access Countries',
                'name' => 'access_countries',
            ],
            [
                'module' => 'Geolocation',
                'group' => 'Countries',
                'label' => 'Access Country Details',
                'name' => 'access_country_details',
            ],

            //Governorates Permissions
            [
                'module' => 'Geolocation',
                'group' => 'Governorates',
                'label' => 'Create Governorate',
                'name' => 'create_governorate',
            ],
            [
                'module' => 'Geolocation',
                'group' => 'Governorates',
                'label' => 'Edit Governorate',
                'name' => 'edit_governorate',
            ],
            [
                'module' => 'Geolocation',
                'group' => 'Governorates',
                'label' => 'Delete Governorate',
                'name' => 'delete_governorate',
            ],
            [
                'module' => 'Geolocation',
                'group' => 'Governorates',
                'label' => 'Access Governorates',
                'name' => 'access_governorates',
            ],
            [
                'module' => 'Geolocation',
                'group' => 'Governorates',
                'label' => 'Access Governorate Details',
                'name' => 'access_governorate_details',
            ],

            //Cities Permissions
            [
                'module' => 'Geolocation',
                'group' => 'Cities',
                'label' => 'Create City',
                'name' => 'create_city',
            ],
            [
                'module' => 'Geolocation',
                'group' => 'Cities',
                'label' => 'Edit City',
                'name' => 'edit_city',
            ],
            [
                'module' => 'Geolocation',
                'group' => 'Cities',
                'label' => 'Delete City',
                'name' => 'delete_city',
            ],
            [
                'module' => 'Geolocation',
                'group' => 'Cities',
                'label' => 'Access Cities',
                'name' => 'access_cities',
            ],
            [
                'module' => 'Geolocation',
                'group' => 'Cities',
                'label' => 'Access City Details',
                'name' => 'access_city_details',
            ],

            //Districts Permissions
            [
                'module' => 'Geolocation',
                'group' => 'Districts',
                'label' => 'Create District',
                'name' => 'create_district',
            ],
            [
                'module' => 'Geolocation',
                'group' => 'Districts',
                'label' => 'Edit District',
                'name' => 'edit_district',
            ],
            [
                'module' => 'Geolocation',
                'group' => 'Districts',
                'label' => 'Delete District',
                'name' => 'delete_district',
            ],
            [
                'module' => 'Geolocation',
                'group' => 'Districts',
                'label' => 'Access Districts',
                'name' => 'access_districts',
            ],
            [
                'module' => 'Geolocation',
                'group' => 'Districts',
                'label' => 'Access District Details',
                'name' => 'access_district_details',
            ],

            //Settings
            [
                'module' => 'Settings',
                'group' => 'Geolocation',
                'label' => 'Geolocation Settings',
                'name' => 'dashboard.settings.geolocation',
            ],

        ];

        // collect($permissionsNames)->each(function ($permission) {
        //     Permission::firstOrCreate($permission);
        // });

        collect($permissionsNames)->each(function ($permission) {
            $permissionModel = Permission::query();
            $permissionModel = $permissionModel->where('name', $permission['name']);

            if (isset($permission['new_name']) && $permission['new_name']) {
                $permissionModel->orWhere('name', $permission['new_name']);
                $permission['name'] = $permission['new_name'];
                unset($permission['new_name']);
            }

            $permissionModel = $permissionModel->first();

            if ($permissionModel) {
                $permissionModel->update($permission);
            } else {
                Permission::create($permission);
            }
        });

    }
}
