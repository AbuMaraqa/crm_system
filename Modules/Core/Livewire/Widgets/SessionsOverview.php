<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Livewire\Widgets;

use Filament\Tables\Columns\TextColumn;
use Filament\Widgets\TableWidget;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\Lazy;
use Modules\Core\Entities\Session;

#[Lazy]
class SessionsOverview extends TableWidget
{
    protected int|string|array $columnSpan = 8;

    public function getTableHeading(): string|Htmlable|null
    {
        return __('Sessions');
    }

    protected function getTableQuery(): Builder
    {
        return Session::query();
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('ip_address')
                ->label(__('IP'))
                ->copyable()
                ->searchable()
                ->sortable(),

            TextColumn::make('user_agent')
                ->label(__('User Agents'))
                ->description(fn (Session $session): string => $session->getParsedUserAgent())
                ->wrap()
                ->searchable()
                ->sortable(),

            TextColumn::make('last_activity')
                ->label(__('Last Activity'))
                ->since(),
        ];
    }
}
