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
use Modules\Core\Services\Widgets\WidgetItem;

class WidgetItemComponent extends Component
{
    public WidgetItem $widgetItem;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(WidgetItem $widgetItem)
    {
        $this->widgetItem = $widgetItem;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application
     */
    public function render()
    {
        return view('core::components.others.widget-item-component');
    }
}
