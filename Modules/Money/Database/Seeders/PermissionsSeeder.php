<?php

namespace Modules\Money\Database\Seeders;

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

            //Settings
            [
                'module' => 'Settings',
                'group' => 'Money',
                'label' => 'Money Settings',
                'name' => 'dashboard.settings.money',
            ],

        ];

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
