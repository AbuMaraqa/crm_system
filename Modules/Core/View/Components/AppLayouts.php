<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/2/24, 9:34 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Modules\Core\Entities\Setting;
use Modules\Core\Traits\UserPreferences;

class AppLayouts extends Component
{
    public ?string $favIcons;

    /**
     * @var mixed|null
     */
    public mixed $breadcrumbs;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($breadcrumbs = null)
    {
        $this->favIcons = Setting::renderFavicon();
        $this->breadcrumbs = $breadcrumbs;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render()
    {
        app('Illuminate\Foundation\Vite')->useBuildDirectory('/dashboard-assets/output');

        return view('core::components.app-layouts');
    }
}
