<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/2/24, 9:34 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Modules\Core\Entities\Setting;
use Modules\Core\Traits\UserPreferences;

class AuthLayouts extends Component
{
    public string $favIcons;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->favIcons = Setting::renderFavicon();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render()
    {
        app('Illuminate\Foundation\Vite')->useBuildDirectory('/dashboard-assets/output');

        return view('core::components.auth-layouts');
    }
}
