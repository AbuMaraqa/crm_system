<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Providers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use Modules\Core\Livewire\Widgets\WelcomeMessage;
use Modules\Core\Services\Widgets\Widget;
use Modules\Core\Services\Widgets\WidgetItem;

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

        //        $dashboardWidgets
        //            ->addItem(
        //                WidgetItem::make(\Modules\Core\Livewire\Widgets\StatsOverview::class)
        //                    ->sort(1)
        //                    ->visible(function () {
        //                        return auth()->user()->canany(['dashboard.user_management.users']);
        //                    })
        //                    ->columnSpan(12)
        //            );

        $dashboardWidgets->addItem(
            WidgetItem::make(WelcomeMessage::class)
                ->sort(1)
                ->columnSpanFull()
        );

    }
}
