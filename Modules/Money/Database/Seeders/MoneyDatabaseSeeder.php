<?php

namespace Modules\Money\Database\Seeders;

use Illuminate\Database\Seeder;

class MoneyDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionsSeeder::class);
    }
}
