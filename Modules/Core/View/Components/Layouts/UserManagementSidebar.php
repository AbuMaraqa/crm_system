<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\View\Components\Layouts;

use Illuminate\View\Component;
use Modules\Core\Entities\User;

class UserManagementSidebar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public User $user)
    {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('core::components.layouts.user-management-sidebar');
    }
}
