<?php

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
            'middleware' => ['auth', 'can:dashboard.access', 'user.allowed'],
            'prefix' => config('project.dashboard_prefix'),
            'as' => 'dashboard.',
            'namespace' => 'Modules\Money\Livewire\Pages\Settings',

        ], function () {

            Route::get('settings/money-settings', MoneySettingsPage::class)
                ->name('settings.money')
                ->middleware('can:dashboard.settings.money');
        });
//    });
});
