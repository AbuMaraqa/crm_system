<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/23/24, 9:35 AM.
 * @Project: Jumla
 ************************************************/

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group([
    'prefix'     => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],

], function () {

    Route::group([

        'namespace'  => 'Modules\Lead\Livewire\Pages',
        'prefix'     => config('project.dashboard_prefix') . '/lead',
        'middleware' => ['auth', 'verified:dashboard.account.profile', 'can:dashboard.access', 'user.allowed'],
        'as'         => 'dashboard.lead.',

    ], function () {
        // Tag Routes
        Route::prefix('tags')->group(function () {
            Route::get('/', Tag\Index::class)->name('tags')->middleware('can:dashboard.lead.tags');
        });

        // Department Routes
        Route::prefix('departments')->group(function () {
            Route::get('/', Department\Index::class)->name('departments')->middleware('can:dashboard.lead.departments');
        });

        // Status Routes
        Route::prefix('statuses')->group(function () {
            Route::get('/', Status\Index::class)->name('statuses')->middleware('can:dashboard.lead.statuses');
        });

        // Source Routes
        Route::prefix('sources')->group(function () {
            Route::get('/', Source\Index::class)->name('sources')->middleware('can:dashboard.lead.sources');
        });

        // Source Routes
        Route::prefix('leads')->group(function () {
            Route::get('/', Lead\Index::class)->name('leads')->middleware('can:dashboard.lead.leads');
            Route::get('/create', Lead\Create::class)->name('leads.create')->middleware('can:dashboard.lead.leads.create');
            Route::get('{lead}/edit', Lead\Edit::class)->name('leads.edit')->middleware('can:dashboard.lead.leads.edit');
        });
    });
});
