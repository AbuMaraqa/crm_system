<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Livewire\Auth;

use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Grouping\Group;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Str;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Malzariey\FilamentDaterangepickerFilter\Filters\DateRangeFilter;
use Modules\Core\Contracts\ActivityLogsContract;
use Modules\Core\Entities\Activity;
use Modules\Core\Entities\User;
use Modules\Core\Filament\Tables\Columns\EventAtColumn;
use Modules\Core\View\Components\AppLayouts;

class History extends Component implements HasForms, HasTable
{
    use InteractsWithForms;
    use InteractsWithTable;

    #[Computed()]
    public function user(): User
    {
        return auth()->user();
    }

    public function table(Table $table): Table
    {
        return $table
            ->heading(__('Activity Logs'))
            ->relationship(fn (): MorphMany => $this->user->actions()
                ->with([
                    'subject' => function ($query) {
                        $query->withoutGlobalScopes();
                    },
                    'causer' => function ($query) {
                        $query->withoutGlobalScopes();
                    },
                ]))
            ->columns([

                TextColumn::make('batch_uuid')
                    ->label(__('Batch Uuid'))
                    ->badge()
                    ->color('danger')
                    ->searchable(isIndividual: true),

                TextColumn::make('log_name')
                    ->label(__('Log Name'))
                    ->searchable(isIndividual: true)
                    ->sortable(),

                TextColumn::make('event')
                    ->label(__('Event'))
                    ->formatStateUsing(function (?string $state) {
                        if (filled($state)) {
                            return Str::title($state);
                        }
                    })
                    ->searchable(isIndividual: true)
                    ->sortable(),

                TextColumn::make('description')
                    ->label(__('Description'))
                    ->formatStateUsing(function (?string $state) {
                        if (filled($state)) {
                            return Str::title($state);
                        }
                    })
                    ->extraAttributes([
                        'dir' => 'ltr',
                    ])
                    ->searchable(isIndividual: true)
                    ->sortable(),

                TextColumn::make('ip_address')
                    ->label(__('IP Address'))
                    ->toggleable(),

                TextColumn::make('user_agent')
                    ->label(__('User Agents'))
                    ->description(fn (Activity $activity): string => $activity->getParsedUserAgent())
                    ->toggleable(true, true)
                    ->searchable(),

                EventAtColumn::make('created_at')
                    ->createdAt(),

                EventAtColumn::make('updated_at')
                    ->updatedAt(),

            ])
            ->groups([
                Group::make('log_name')
                    ->label(__('Log Name'))
                    ->getTitleFromRecordUsing(fn (Activity $activity): string => __($activity->log_name))
                    ->collapsible(),

                Group::make('created_at')
                    ->label(__('Event At'))
                    ->date()
                    ->collapsible(),

            ])
            ->filters([
                DateRangeFilter::make('created_at')
                    ->label(__('Event At'))
                    ->placeholder(__('Event At'))
                    ->withIndicator(),
            ])
            ->actions([

                ViewAction::make()
                    ->url(fn (Activity $activity) => route('dashboard.user_management.activity_logs.view', $activity->id))
                    ->visible(fn (): bool => auth()->user()->can('dashboard.user_management.activity_logs.view'))
                    ->viewActionCommonConfiguration(),

                ViewAction::make()
                    ->hiddenLabel()
                    ->label(__('Visit record'))
                    ->url(function (Activity $activity): ?string {
                        if ($activity->subject instanceof ActivityLogsContract) {
                            return $activity->subject->getRecordUrl();
                        }

                        return null;
                    })
                    ->visible(function (Activity $activity): bool {
                        return (bool) $activity->subject?->getRecordUrl();
                    })
                    ->icon('ri-history-fill')
                    ->extraAttributes([
                        'class' => 'fi-ta-visit-record-action-btn tooltip',
                        'title' => __('Visit record'),
                    ])
                    ->button(),

            ])
            ->defaultSort('id', 'desc');
    }

    public function render()
    {
        return view('core::livewire.auth.history')
            ->layout(AppLayouts::class, [
                'pageTitle' => __('Latest Activities'),
                'breadcrumbs' => [
                    route('dashboard.home') => __('Home'),
                    route('dashboard.account.profile') => __('Profile'),
                    route('dashboard.account.history') => __('History'),
                ],
            ]);
    }
}
