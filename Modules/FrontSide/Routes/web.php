<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/24/24, 5:13 AM.
 * @Project: Jumla
 ************************************************/

use Modules\FrontSide\Livewire\ThemeTwo\Pages\HomePage;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Modules\FrontSide\Livewire\ThemeTwo\Pages\AboutUs;
use Modules\FrontSide\Livewire\ThemeTwo\Pages\CategoriesPage;
use Modules\FrontSide\Livewire\ThemeTwo\Pages\ContactUs;
use Modules\FrontSide\Livewire\ThemeTwo\Pages\ProductDetailsPage;
use Modules\FrontSide\Livewire\ThemeTwo\Pages\ShopPage;
use Modules\FrontSide\Livewire\ThemeTwo\Pages\TermsAndConditions;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],

], function () {


    Route::group([

        // 'namespace' => 'Modules\FrontSide\Livewire\ThemeTwo\Pages',
        'as' => 'frontside.',

    ], function () {

        Route::get('/', HomePage::class)->name('homepage');
        // Route::get('/', HomePage::class)->name('homepage');
        Route::get('/categories', CategoriesPage::class)->name('categories');
        Route::get('product/{slug}', ProductDetailsPage::class)->name('product_details');
        Route::get('/shop', ShopPage::class)->name('shop');
        Route::get('about-us', AboutUs::class)->name('about-us');
        Route::get('contact-us', ContactUs::class)->name('contact-us');
        // Route::get('privacy-policy', PrivacyPolicy::class)->name('privacy_policy');
        Route::get('terms-and-conditions', TermsAndConditions::class)->name('terms_and_conditions');
    });
});
