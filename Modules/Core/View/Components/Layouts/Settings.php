<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\View\Components\Layouts;

use Illuminate\View\Component;
use Modules\Core\Services\Sidebar\Sidebar;

class Settings extends Component
{
    public Sidebar $sidebar;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->sidebar = app('SettingsSidebar');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('core::components.layouts.settings');
    }
}
