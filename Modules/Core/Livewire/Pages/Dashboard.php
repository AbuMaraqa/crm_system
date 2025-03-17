<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Livewire\Pages;

use Livewire\Component;
use Modules\Core\View\Components\AppLayouts;

class Dashboard extends Component
{
    public function render()
    {
        $dashboardWidgets = app('DashboardWidgets');

        return view('core::livewire.pages.dashboard', [
            'dashboardWidgets' => $dashboardWidgets,
        ])
            ->layout(AppLayouts::class, [
                'pageTitle' => __('Dashboard'),
                'breadcrumbs' => [
                    route('dashboard.home') => __('Home'),
                ],

            ]);
    }
}
