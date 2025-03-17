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

class PrivacyPolicy extends Component
{
    public function render()
    {

        $ownerName = config('app.name');
        $ownerEmail = '';

        $trans = 'trans';

        $tags = [];
        $tags[] = "<title>{$trans('Privacy Policy')}</title>";
        $tags[] = "<meta property='og:title' content='{$trans('Privacy Policy')}'>";
        $tags[] = "<meta name='description' content='{$trans('Privacy Policy')}'>";
        $tags[] = "<meta property='og:description' content='{$trans('Privacy Policy')}'>";
        $tags[] = "<meta name='keywords' content='{$trans('Privacy Policy')}'>";
        $tags[] = "<meta property='og:url' content='".url()->current()."'>";
        $tags[] = '<meta property="og:type" content="website">';

        return view('frontside::livewire.theme-one.pages.privacy-policy', [
            'ownerName' => $ownerName,
            'ownerEmail' => $ownerEmail,
        ])
            ->layout(AppLayouts::class, [
                'metaTags' => $tags,
                'pageTitle' => __('Privacy Policy'),
            ]);
    }
}
