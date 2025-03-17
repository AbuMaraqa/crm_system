<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 7/19/24, 7:13 PM.
 * @Project: Jumla
 ************************************************/

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],

], function () {

//    Route::middleware([
//        'universal',
//        InitializeTenancyByDomain::class,
//    ])->group(function () {

        Route::group([

            'namespace' => 'Modules\GeoLocation\Livewire\Pages',
            'prefix' => config('project.dashboard_prefix').'/geo-location',
            'middleware' => ['auth', 'verified:dashboard.account.profile', 'can:dashboard.access', 'user.allowed'],
            'as' => 'dashboard.geolocation.',

        ], function () {

            Route::prefix('countries')->group(function () {
                Route::get('/', Countries\Index::class)->name('countries')->middleware('can:access_countries');
                Route::get('create', Countries\Create::class)->name('countries.create')->middleware('can:create_country');
                Route::get('{country}/edit', Countries\Edit::class)->name('countries.edit')->middleware('can:edit_country');
            });

            Route::prefix('governorates')->group(function () {
                Route::get('/', Governorates\Index::class)->name('governorates')->middleware('can:access_governorates');
                Route::get('create', Governorates\Create::class)->name('governorates.create')->middleware('can:create_governorate');
                Route::get('{governorate}/edit', Governorates\Edit::class)->name('governorates.edit')->middleware('can:edit_governorate');
            });

            Route::prefix('cities')->group(function () {
                Route::get('/', Cities\Index::class)->name('cities')->middleware('can:access_cities');
                Route::get('create', Cities\Create::class)->name('cities.create')->middleware('can:create_city');
                Route::get('{city}/edit', Cities\Edit::class)->name('cities.edit')->middleware('can:edit_city');
            });

            Route::prefix('districts')->group(function () {
                Route::get('/', Districts\Index::class)->name('districts')->middleware('can:access_districts');
                Route::get('create', Districts\Create::class)->name('districts.create')->middleware('can:create_district');
                Route::get('{district}/edit', Districts\Edit::class)->name('districts.edit')->middleware('can:edit_district');
            });
        });

        Route::group([
            'middleware' => ['auth', 'can:dashboard.access', 'user.allowed'],
            'prefix' => config('project.dashboard_prefix'),
            'as' => 'dashboard.',
            'namespace' => 'Modules\GeoLocation\Livewire\Pages\Settings',

        ], function () {

            Route::get('settings/geolocation-settings', GeoLocationSettingsPage::class)
                ->name('settings.geolocation')
                ->middleware('can:dashboard.settings.geolocation');
        });
//    });
});
