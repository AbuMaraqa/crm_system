<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/23/24, 9:35 AM.
 * @Project: Jumla
 ************************************************/

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Core\Database\Seeders\CoreDatabaseSeeder;
use Modules\GeoLocation\Database\Seeders\GeoLocationDatabaseSeeder;
use Modules\Money\Database\Seeders\MoneyDatabaseSeeder;
use Modules\Shop\Database\Seeders\ShopDatabaseSeeder;

class MasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(CoreDatabaseSeeder::class);
        $this->call(GeoLocationDatabaseSeeder::class);
        $this->call(MoneyDatabaseSeeder::class);
        $this->call(ShopDatabaseSeeder::class);
    }
}
