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
use Modules\Core\Entities\Activity;

#[Lazy]
class HistoryOverview extends TableWidget
{
    protected int|string|array $columnSpan = 12;

    public function getTableHeading(): string|Htmlable|null
    {
        return __('History');
    }

    protected function getTableQuery(): Builder
    {
        return Activity::query()->latest();
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('event')
                ->label(__('Event'))
                ->formatStateUsing(fn ($state): string => __($state))
                ->description(fn (Activity $activity): string => __($activity->description))
                ->wrap()
                ->searchable()
                ->sortable(),

            TextColumn::make('ip_address')
                ->label(__('IP'))
                ->copyable()
                ->searchable()
                ->sortable(),

            TextColumn::make('created_at')
                ->label(__('Event At'))
                ->since(),
        ];
    }
}
