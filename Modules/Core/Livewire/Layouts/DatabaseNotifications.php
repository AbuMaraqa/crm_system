<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Livewire\Layouts;

use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use Modules\Core\Traits\InteractsWithNotifications;

class DatabaseNotifications extends Component
{
    use InteractsWithNotifications;
    use WithoutUrlPagination;
    use WithPagination;

    /**
     * @return array<string>
     */
    public function queryStringHandlesPagination(): array
    {
        return [];
    }

    public function render(): View
    {
        return view('core::livewire.layouts.database-notifications');
    }
}
