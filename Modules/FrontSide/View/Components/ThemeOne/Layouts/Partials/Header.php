<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\FrontSide\View\Components\ThemeOne\Layouts\Partials;

use Illuminate\View\Component;
use Illuminate\View\View;
use Modules\Core\Services\Settings\ApplicationSettings;

class Header extends Component
{
    /**
     * @var mixed|null
     */
    public mixed $logoUrl;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $applicationSettings = app(ApplicationSettings::class);
        $this->logoUrl       = $applicationSettings->getUrl('ltr_dark_site_logo', 'website-logo', 'logo-lg');

        if (app()->getLocale() == 'ar') {
            $this->logoUrl = $applicationSettings->getUrl('rtl_dark_site_logo', 'website-logo', 'logo-lg');
        }
    }

    /**
     * Get the view/contents that represent the component.
     */
    public function render(): View|string
    {
        return view('frontside::components.theme-one.layouts.partials.header');
    }
}
