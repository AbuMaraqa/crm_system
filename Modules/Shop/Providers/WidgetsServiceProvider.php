<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/24/24, 6:26 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Shop\Providers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use Modules\Core\Services\Widgets\Widget;
use Modules\Core\Services\Widgets\WidgetItem;
use Modules\Shop\Livewire\Widgets\ShopStatsOverview;

class WidgetsServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('DashboardWidgets', function (Application $app) {
            return new Widget('DashboardWidgets');
        });
    }


    public function boot()
    {
        /**
         * @var Widget $dashboardWidgets
         */
        $dashboardWidgets = app('DashboardWidgets');

        $dashboardWidgets->addItem(
            WidgetItem::make(ShopStatsOverview::class)
                ->visible(function () {
                    return auth()->user()->canany([
                        'dashboard.shop.products',
                        'dashboard.shop.product_categories',
                    ]);
                })
                ->sort(4)
                ->columnSpan([
                    'default' => 12,
                    'sm' => 12,
                    'md' => 12,
                    'lg' => 12,
                    'xl' => 12,
                ])
        );
    }
}
