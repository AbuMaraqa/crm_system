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
use Modules\GeoLocation\Entities\District;

class DistrictsTableSeeder extends Seeder
{
    public function run()
    {
        $json = File::get(__DIR__.'/../Data/districts.json');

        $districts = json_decode($json, true);

        $districts = collect($districts)->map(function ($district) {

            $district['id'] = (int) ltrim($district['geo_district_id'], '1');

            unset($district['geo_district_id']);

            unset($district['status']);

            $district['created_at'] = now();
            $district['updated_at'] = now();

            $district['country_id'] = $district['country_id'] ? (int) ltrim($district['country_id'], '1') : null;
            $district['governorate_id'] = $district['governorate_id'] ? (int) ltrim($district['governorate_id'], '1') : null;
            $district['city_id'] = $district['city_id'] ? (int) ltrim($district['city_id'], '1') : null;

            return $district;
        });

        $chunks = $districts->chunk(1000);

        foreach ($chunks as $chunk) {
            District::insertOrIgnore($chunk->toArray());
        }
    }
}
