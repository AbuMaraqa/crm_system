<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\View\Components\Others;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\View\Component;
use Modules\Core\Services\Widgets\WidgetGroup;

class WidgetGroupComponent extends Component
{
    public WidgetGroup $widgetGroup;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(WidgetGroup $widgetGroup)
    {
        $this->widgetGroup = $widgetGroup;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application
     */
    public function render()
    {
        return view('core::components.others.widget-group-component');
    }
}
