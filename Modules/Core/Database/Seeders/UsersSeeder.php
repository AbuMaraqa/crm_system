<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/23/24, 9:35 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Core\Entities\User;
use Modules\Core\Enums\UserRole;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdmin = User::firstOrCreate([
            'email' => 'shakerawad@paltechhub.com',
        ], [
            'name' => 'Super Admin',

            'password' => 'shakerawad@123',

            'phone_number' => '+970595696126',
        ]);
        $superAdmin->markEmailAsVerified();
        $superAdmin->syncRoles(UserRole::SuperAdmin->value);
        $superAdmin->generateAvatar();

        $admin = User::firstOrCreate([
            'email' => 'admin@admin.com',
        ], [
            'name' => 'Admin User',

            'password' => 'admin@123',

            'phone_number' => '+970595123456',
        ]);
        $admin->markEmailAsVerified();
        $admin->syncRoles(UserRole::SuperAdmin->value);
        $admin->generateAvatar();
    }
}
