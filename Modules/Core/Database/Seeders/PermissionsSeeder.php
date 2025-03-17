<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/23/24, 9:35 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Database\Seeders;

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
            [
                'module' => 'Dashboard',
                'group' => 'Dashboard',
                'label' => 'Access Dashboard',
                'name' => 'dashboard.access',
            ],

            // Roles
            [
                'module' => 'Dashboard',
                'group' => 'Roles',
                'label' => 'Create Role',
                'name' => 'dashboard.user_management.roles.create',
            ],
            [
                'module' => 'Dashboard',
                'group' => 'Roles',
                'label' => 'Edit Role',
                'name' => 'dashboard.user_management.roles.edit',
            ],
            [
                'module' => 'Dashboard',
                'group' => 'Roles',
                'label' => 'Delete Role',
                'name' => 'dashboard.user_management.roles.delete',
            ],
            [
                'module' => 'Dashboard',
                'group' => 'Roles',
                'label' => 'Bulk Delete Role',
                'name' => 'dashboard.user_management.roles.delete.bulk',
            ],
            [
                'module' => 'Dashboard',
                'group' => 'Roles',
                'label' => 'View All Roles',
                'name' => 'dashboard.user_management.roles',
            ],
            [
                'module' => 'Dashboard',
                'group' => 'Roles',
                'label' => 'View Single Role Details',
                'name' => 'dashboard.user_management.roles.view',
            ],

            // Users
            [
                'module' => 'Dashboard',
                'group' => 'Users',
                'label' => 'Create User',
                'name' => 'dashboard.user_management.users.create',
            ],
            [
                'module' => 'Dashboard',
                'group' => 'Users',
                'label' => 'Edit User',
                'name' => 'dashboard.user_management.users.edit',
            ],
            [
                'module' => 'Dashboard',
                'group' => 'Users',
                'label' => 'Delete User',
                'name' => 'dashboard.user_management.users.delete',
            ],
            [
                'module' => 'Dashboard',
                'group' => 'Users',
                'label' => 'Bulk Delete User',
                'name' => 'dashboard.user_management.users.delete.bulk',
            ],
            [
                'module' => 'Dashboard',
                'group' => 'Users',
                'label' => 'Restore User',
                'name' => 'dashboard.user_management.users.restore',
            ],
            [
                'module' => 'Dashboard',
                'group' => 'Users',
                'label' => 'Filter Deleted Users',
                'name' => 'dashboard.user_management.users.filters.trashed',
            ],
            [
                'module' => 'Dashboard',
                'group' => 'Users',
                'label' => 'View All Users',
                'name' => 'dashboard.user_management.users',
            ],
            [
                'module' => 'Dashboard',
                'group' => 'Users',
                'label' => 'View Single User Details',
                'name' => 'dashboard.user_management.users.view',
            ],
            [
                'module' => 'Dashboard',
                'group' => 'Users',
                'label' => 'Change Password',
                'name' => 'dashboard.user_management.users.change_password',
            ],
            [
                'module' => 'Dashboard',
                'group' => 'Users',
                'label' => 'View User Sessions',
                'name' => 'dashboard.user_management.users.sessions',
            ],
            [
                'module' => 'Dashboard',
                'group' => 'Users',
                'label' => 'View User Histories',
                'name' => 'dashboard.user_management.users.history',
            ],
            [
                'module' => 'Dashboard',
                'group' => 'Users',
                'label' => 'View User Messages',
                'name' => 'dashboard.user_management.users.messages',
            ],
            [
                'module' => 'Dashboard',
                'group' => 'Users',
                'label' => 'Login As Another User',
                'name' => 'dashboard.user_management.users.impersonate',
            ],

            // Profile
            [
                'module' => 'Dashboard',
                'group' => 'Profile',
                'label' => 'View Profile',
                'name' => 'dashboard.account.profile',
            ],
            [
                'module' => 'Dashboard',
                'group' => 'Profile',
                'label' => 'Edit Profile',
                'name' => 'dashboard.account.profile.edit',
            ],
            [
                'module' => 'Dashboard',
                'group' => 'Profile',
                'label' => 'Change Password',
                'name' => 'dashboard.account.change_password',
            ],
            [
                'module' => 'Dashboard',
                'group' => 'Profile',
                'label' => 'View Sessions',
                'name' => 'dashboard.account.sessions',
            ],
            [
                'module' => 'Dashboard',
                'group' => 'Profile',
                'label' => 'Logout From All Other Devices',
                'name' => 'dashboard.account.sessions.logout_from_all_other_devices',
            ],
            [
                'module' => 'Dashboard',
                'group' => 'Profile',
                'label' => 'View Histories',
                'name' => 'dashboard.account.history',
            ],
            [
                'module' => 'Dashboard',
                'group' => 'Profile',
                'label' => 'View Notifications',
                'name' => 'dashboard.account.notifications',
            ],
            [
                'module' => 'Dashboard',
                'group' => 'Profile',
                'label' => 'View Notification Details',
                'name' => 'dashboard.account.notifications.view',
            ],

            // Activity Logs
            [
                'module' => 'Dashboard',
                'group' => 'Activity Logs',
                'label' => 'View All Activity Logs',
                'name' => 'dashboard.user_management.activity_logs',
            ],
            [
                'module' => 'Dashboard',
                'group' => 'Activity Logs',
                'label' => 'View Single Activity Log Details',
                'name' => 'dashboard.user_management.activity_logs.view',
            ],
            [
                'module' => 'Dashboard',
                'group' => 'Activity Logs',
                'label' => 'Record History',
                'name' => 'dashboard.user_management.activity_logs.record.activities',
            ],

            // Settings
            [
                'module' => 'Settings',
                'group' => 'General',
                'label' => 'General Settings',
                'name' => 'dashboard.settings.general',
            ],
            [
                'module' => 'Settings',
                'group' => 'Maintenance',
                'label' => 'Maintenance Settings',
                'name' => 'dashboard.settings.maintenance',
            ],
            [
                'module' => 'Settings',
                'group' => 'SMTP',
                'label' => 'SMTP Settings',
                'name' => 'dashboard.settings.smtp',
            ],
            [
                'module' => 'Settings',
                'group' => 'Google ReCaptcha',
                'label' => 'Google ReCaptcha Settings',
                'name' => 'dashboard.settings.google_recaptcha',
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

        // collect($permissionsNames)->each(function ($permission) {
        //     Permission::firstOrCreate([
        //         'module' => 'Core',
        //     ] + $permission);
        // });
    }
}
