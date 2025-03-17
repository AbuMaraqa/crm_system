<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Filament\Tables\Actions;

use Filament\Tables\Actions\Action;
use Illuminate\Support\Facades\Crypt;

class ActivitiesAction extends Action
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->hiddenLabel()
            ->icon('ri-history-fill')
            ->label(__('History'))
            ->url(fn ($record) => route('dashboard.user_management.activity_logs.record.activities', [Crypt::encryptString(get_class($record)), $record->getKey()]))
            ->visible(fn (): bool => auth()->user()->can('dashboard.user_management.activity_logs.record.activities'))
            ->extraAttributes([
                'class' => 'fi-ta-history-action-btn tooltip',
                'title' => __('History'),
            ])
            ->button();
    }
}
