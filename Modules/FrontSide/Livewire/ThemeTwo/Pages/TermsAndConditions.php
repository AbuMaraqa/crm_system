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

class TermsAndConditions extends Component
{
    public function render()
    {

        $ownerName = config('app.name');
        $ownerEmail = '';

        $trans = 'trans';

        $tags = [];
        $tags[] = "<title>{$trans('Terms And Conditions')}</title>";
        $tags[] = "<meta property='og:title' content='{$trans('Terms And Conditions')}'>";
        $tags[] = "<meta name='description' content='{$trans('Terms And Conditions')}'>";
        $tags[] = "<meta property='og:description' content='{$trans('Terms And Conditions')}'>";
        $tags[] = "<meta name='keywords' content='{$trans('Terms And Conditions')}'>";
        $tags[] = "<meta property='og:url' content='".url()->current()."'>";
        $tags[] = '<meta property="og:type" content="website">';

        $terms_and_conditions = Page::where('slug', 'terms-and-conditions')->first();

        return view('frontside::livewire.theme-two.pages.terms-and-conditions', [
            'ownerName' => $ownerName,
            'ownerEmail' => $ownerEmail,
            'terms_and_conditions' => $terms_and_conditions
        ])
            ->layout(AppLayouts::class, [
                'metaTags' => $tags,
                'pageTitle' => __('Terms And Conditions'),
            ]);
    }
}
