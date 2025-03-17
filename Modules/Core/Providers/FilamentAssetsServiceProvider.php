<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Providers;

use Filament\Support\Assets\AlpineComponent;
use Filament\Support\Facades\FilamentAsset;
use Illuminate\Support\ServiceProvider;

class FilamentAssetsServiceProvider extends ServiceProvider
{
    public function register()
    {
    }

    public function boot()
    {
        FilamentAsset::register([
            AlpineComponent::make('flatpickr-component', __DIR__.'/../Resources/assets/js/components/flatpickr/flatpickr-component.js')->loadedOnRequest(),

        ], package: 'core/flatpickr');
    }
}
