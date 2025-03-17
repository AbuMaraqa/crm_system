<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Livewire\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Livewire\Attributes\Lazy;
use Modules\Core\Entities\User;

#[Lazy]
class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('users', User::count())
                ->label(__('Users'))
                ->icon('heroicon-m-users')
                ->url(route('dashboard.user_management.users')),

        ];
    }
}
