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
use Modules\GeoLocation\Entities\City;

class CitiesTableSeeder extends Seeder
{
    public function run()
    {
        $json = File::get(__DIR__.'/../Data/cities.json');

        $cities = json_decode($json, true);

        $cities = collect($cities)->map(function ($city) {

            $city['id'] = (int) ltrim($city['geo_city_id'], '1');

            unset($city['geo_city_id']);

            unset($city['status']);

            $city['created_at'] = now();
            $city['updated_at'] = now();

            $city['country_id'] = $city['country_id'] ? (int) ltrim($city['country_id'], '1') : null;
            $city['governorate_id'] = $city['governorate_id'] ? (int) ltrim($city['governorate_id'], '1') : null;

            return $city;
        });

        $chunks = $cities->chunk(1000);

        foreach ($chunks as $chunk) {
            City::insertOrIgnore($chunk->toArray());
        }
    }
}
