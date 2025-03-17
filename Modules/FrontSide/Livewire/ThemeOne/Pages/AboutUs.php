<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\FrontSide\Livewire\ThemeOne\Pages;

use Livewire\Component;
use Modules\FrontSide\View\Components\ThemeOne\Layouts\AppLayouts;

class AboutUs extends Component
{
    public function render()
    {
        $pageTitle   = __('About Us');
        $breadcrumbs = [
            [
                'url'  => route('frontside.homepage'),
                'name' => __('Home Page'),
            ],
            [
                'name' => __('Pages'),
            ],
            [
                'name' => $pageTitle,
            ],
        ];

        return view('frontside::livewire.theme-one.pages.about-us', [
            'pageTitle'   => $pageTitle,
            'breadcrumbs' => $breadcrumbs,
        ])->layout(AppLayouts::class, [
            'pageTitle' => $pageTitle,
        ]);
    }
}
