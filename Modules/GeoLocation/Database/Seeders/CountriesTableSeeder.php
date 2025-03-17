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
use Modules\GeoLocation\Entities\Country;

class CountriesTableSeeder extends Seeder
{
    public function run()
    {
        $json = File::get(__DIR__.'/../Data/countries.json');

        $countries = json_decode($json, true);

        $countries = collect($countries)->map(function ($country) {

            $country['id'] = (int) ltrim($country['geo_country_id'], '1');
            unset($country['geo_country_id']);

            unset($country['flag_image']);

            $country['capital_id'] = $country['capital_id'] ? (int) ltrim($country['capital_id'], '1') : null;

            return $country;
        });

        // File::put(__DIR__ . '/../Data/New/countries.json',$countries->toJson());

        Country::insertOrIgnore($countries->toArray());
    }
}
