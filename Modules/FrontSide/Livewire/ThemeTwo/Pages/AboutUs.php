<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\FrontSide\Livewire\ThemeTwo\Pages;

use Livewire\Component;
use Modules\FrontSide\View\Components\ThemeTwo\Layouts\AppLayouts;
use Modules\Shop\Entities\Page;

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

        $pageDetails = Page::where('slug', 'about-us')->first();

        return view('frontside::livewire.theme-two.pages.about-us', [
            'pageTitle'   => $pageTitle,
            'breadcrumbs' => $breadcrumbs,
            'pageDetails' => $pageDetails
        ])->layout(AppLayouts::class, [
            'pageTitle' => $pageTitle,
        ]);
    }
}
