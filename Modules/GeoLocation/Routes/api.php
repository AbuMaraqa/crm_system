<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/8/24, 9:05 AM.
 * @Project: Jumla
 ************************************************/

use Illuminate\Support\Facades\Route;
use Modules\GeoLocation\Http\Controllers\Api\V1\CityController;
use Modules\GeoLocation\Http\Controllers\Api\V1\CountryController;
use Modules\GeoLocation\Http\Controllers\Api\V1\DistrictController;
use Modules\GeoLocation\Http\Controllers\Api\V1\GovernorateController;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;

Route::group([
    'prefix' => 'v1/dashboard/geo-location',
    'as' => 'api.v1.geolocation.',

], function () {

    Route::group([
        'middleware' => [
            'universal',
            InitializeTenancyByDomain::class,
        ],
    ], function () {

        Route::get('countries', [CountryController::class, 'index']);
        Route::get('governorates', [GovernorateController::class, 'index']);
        Route::get('cities', [CityController::class, 'index']);
        Route::get('districts', [DistrictController::class, 'index']);

    });
});
