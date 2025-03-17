<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/2/24, 9:34 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\View\Components\Layouts;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\View\Component;
use Modules\Core\Services\Settings\ApplicationSettings;
use Modules\Core\Services\Sidebar\Sidebar as SidebarSidebar;

// use Modules\Dashboard\Entities\Setting;

class Sidebar extends Component
{
    public ?string $logoUrl;

    public SidebarSidebar $sidebar;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(SidebarSidebar $sidebar)
    {
        $applicationSettings = app(ApplicationSettings::class);

        $this->logoUrl       = $applicationSettings->getUrl('ltr_dark_site_logo', 'website-logo', 'logo-lg');

        if (app()->getLocale() == 'ar') {
            $this->logoUrl = $applicationSettings->getUrl('rtl_dark_site_logo', 'website-logo', 'logo-lg');
        }

        $this->sidebar = $sidebar;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): Application|View|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view("core::components.layouts.sidebar");
    }
}
