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

        'namespace'  => 'Modules\lead\Livewire\Pages',
        'prefix'     => config('project.dashboard_prefix') . '/lead',
        'middleware' => ['auth', 'verified:dashboard.account.profile', 'can:dashboard.access', 'user.allowed'],
        'as'         => 'dashboard.lead.',

    ], function () {

        // Shop Brand Routes
        Route::prefix('tags')->group(function () {
            Route::get('/', Tag\Index::class)->name('tags')->middleware('can:dashboard.lead.tags');
//            Route::get('create', Brand\Create::class)->name('brands.create')->middleware('can:dashboard.shop.brands.create');
//            Route::get('{brand}/edit', Brand\Edit::class)->name('brands.edit')->middleware('can:dashboard.shop.brands.edit');
        });

        // Shop Tag Labels Routes
        Route::prefix('product-labels')->group(function () {
            Route::get('/', ProductLabels\Index::class)->name('product_labels')->middleware('can:dashboard.shop.product_labels');
        });

        // Shop Tag Tags Routes
        Route::prefix('product-tags')->group(function () {
            Route::get('/', ProductTags\Index::class)->name('product_tags')->middleware('can:dashboard.shop.product_tags');
        });

        // Shop Tag Attributes Sets Routes
//        Route::prefix('product-attribute-sets')->group(function () {
//            Route::get('/', ProductAttributeSets\Index::class)->name('product_attribute_sets')->middleware('can:dashboard.shop.product_attribute_sets');
//            Route::get('create', ProductAttributeSets\Create::class)->name('product_attribute_sets.create')->middleware('can:dashboard.shop.product_attribute_sets.create');
//            Route::get('{productAttributeSet}/edit', ProductAttributeSets\Edit::class)->name('product_attribute_sets.edit')->middleware('can:dashboard.shop.product_attribute_sets.edit');
//        });

        // Shop Tag Categories Routes
        Route::prefix('product-categories')->group(function () {
            Route::get('/', ProductCategory\Index::class)->name('product_categories')->middleware('can:dashboard.shop.product_categories');
            Route::get('create', ProductCategory\Create::class)->name('product_categories.create')->middleware('can:dashboard.shop.product_categories.create');
            Route::get('{productCategory}/edit', ProductCategory\Edit::class)->name('product_categories.edit')->middleware('can:dashboard.shop.product_categories.edit');
        });

        // Shop Products Routes
        Route::prefix('products')->group(function () {
            Route::get('/', Product\Index::class)->name('products')->middleware('can:dashboard.shop.products');
            Route::get('/create', Product\Create::class)->name('products.create')->middleware('can:dashboard.shop.products.create');
            Route::get('/{product}/edit', Product\Edit::class)->name('products.edit')->middleware('can:dashboard.shop.products.edit');
        });

        // Shop Banners Routes
        Route::prefix('banners')->group(function () {
            Route::get('/', Banner\Index::class)->name('banners')->middleware('can:dashboard.shop.banners');
            Route::get('/create', Banner\Create::class)->name('banners.create')->middleware('can:dashboard.shop.banners.create');
            Route::get('/{banner}/edit', Banner\Edit::class)->name('banners.edit')->middleware('can:dashboard.shop.banners.edit');
        });

        // Shop Pages Routes
        Route::prefix('pages')->group(function () {
            Route::get('/', Pages\Index::class)->name('pages')->middleware('can:dashboard.shop.pages');
            Route::get('/create', Pages\Create::class)->name('pages.create')->middleware('can:dashboard.shop.pages.create');
            Route::get('/{page}/edit', Pages\Edit::class)->name('pages.edit')->middleware('can:dashboard.shop.pages.edit');
        });
    });

//        Route::redirect('/', config('project.dashboard_prefix'));
});
