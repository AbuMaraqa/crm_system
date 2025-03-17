<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/2/24, 9:34 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Lead\Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissionsNames = [
            // Shop Brand
            [
                'module' => 'Lead',
                'group'  => 'Tags',
                'label'  => 'View All Tags',
                'name'   => 'dashboard.lead.tags',
            ],
            [
                'module' => 'Shop',
                'group'  => 'Tags',
                'label'  => 'View Single Tag Details',
                'name'   => 'dashboard.lead.tags.view',
            ],
            [
                'module' => 'Shop',
                'group'  => 'Tags',
                'label'  => 'Create Tag',
                'name'   => 'dashboard.lead.tags.create',
            ],
            [
                'module' => 'Shop',
                'group'  => 'Tags',
                'label'  => 'Edit Tag',
                'name'   => 'dashboard.lead.tags.edit',
            ],
            [
                'module' => 'Shop',
                'group'  => 'Tags',
                'label'  => 'Delete Tag',
                'name'   => 'dashboard.lead.tags.delete',
            ],
            [
                'module' => 'Shop',
                'group'  => 'Tags',
                'label'  => 'Bulk Delete Tags',
                'name'   => 'dashboard.lead.tags.bulk_delete',
            ],
            [
                'module' => 'Shop',
                'group'  => 'Tags',
                'label'  => 'Restore Tag',
                'name'   => 'dashboard.lead.tags.restore',
            ],
            [
                'module' => 'Shop',
                'group'  => 'Tags',
                'label'  => 'Filter Deleted Tags',
                'name'   => 'dashboard.lead.tags.filters.trashed',
            ],
        ];

        $permissions = Permission::all();

        collect($permissionsNames)->each(function ($permission) use ($permissions) {
            $permissionModel = $permissions->where('name', $permission['name'])->first();

            if (isset($permission['new_name']) && $permission['new_name']) {
                if (!$permissionModel) {
                    $permissionModel = $permissions->where('name', $permission['new_name'])->first();
                }

                $permission['name'] = $permission['new_name'];
                unset($permission['new_name']);
            }

            if (isset($permission['delete']) && $permission['delete']) {
                $permissionModel?->delete();
            } else {

                if ($permissionModel) {

                    $permissionModel->update($permission);
                } else {
                    $permission = Permission::make($permission);
                    $permission->saveOrFail();
                }
            }
        });

    }
}
