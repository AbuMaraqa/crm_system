<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 2/18/24, 9:59 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\GeoLocation\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Modules\GeoLocation\Entities\Governorate;

class GovernoratesTableSeeder extends Seeder
{
    public function run()
    {
        $json = File::get(__DIR__.'/../Data/governorates.json');

        $governorates = json_decode($json, true);

        $governorates = collect($governorates)->map(function ($governorate) {

            $governorate['id'] = (int) ltrim($governorate['geo_governorate_id'], '1');
            unset($governorate['geo_governorate_id']);

            $governorate['country_id'] = $governorate['country_id'] ? (int) ltrim($governorate['country_id'], '1') : null;

            return $governorate;
        });

        Governorate::insertOrIgnore($governorates->toArray());
    }
}
