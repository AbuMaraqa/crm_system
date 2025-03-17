<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Livewire\Auth;

use Filament\Forms\Components\Placeholder;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Notifications\DatabaseNotification;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Modules\Core\Entities\User;
use Modules\Core\Filament\Tables\Columns\EventAtColumn;
use Modules\Core\View\Components\AppLayouts;

class Notifications extends Component implements HasForms, HasTable
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
            ->heading(__('Notifications'))
            ->query(DatabaseNotification::where('notifiable_id', $this->user->id)->where('notifiable_type', $this->user->getMorphClass()))
            ->columns([

                TextColumn::make('title')
                    ->label(__('Title'))
                    ->color('primary')
                    ->getStateUsing(function (DatabaseNotification $notification) {
                        return __($notification->data['title']);
                    }),

                TextColumn::make('body')
                    ->label(__('Description'))
                    ->color('gray')
                    ->wrap()
                    ->getStateUsing(function (DatabaseNotification $notification) {
                        return isset($notification->data['body']) ? __($notification->data['body']) : '';
                    }),

                EventAtColumn::make('read_at')
                    ->label(__('Read At'))
                    ->toggleable(),

                EventAtColumn::make('created_at')
                    ->createdAt(),

                EventAtColumn::make('updated_at')
                    ->updatedAt(),

            ])
            ->actions([
                //                ActionGroup::make([

                ViewAction::make()
                    ->visible(fn (): bool => auth()->user()->can('dashboard.account.notifications.view'))
                    ->modalHeading(function (DatabaseNotification $notification) {
                        return __($notification->data['title']);
                    })
                    ->form([
                        Placeholder::make('body')
                            ->label('')
                            ->content(function (DatabaseNotification $notification): string {
                                return isset($notification->data['body']) ? __($notification->data['body']) : '';
                            }),

                        Placeholder::make('body')
                            ->label('')
                            ->content(function (DatabaseNotification $notification) {
                                $filamentNotification = Notification::fromDatabase($notification)
                                    ->date($notification->getAttributeValue('created_at'));

                                $actions = [];

                                foreach ($filamentNotification->getActions() as $action) {
                                    if ($action->getUrl()) {
                                        $actions[] = $action;
                                    }
                                }

                                return view('core::components.notifications.actions', [
                                    'actions' => $actions,
                                ]);
                            }),
                    ])
                    ->viewActionCommonConfiguration(),

                Action::make('markAsRead')
                    ->hiddenLabel()
                    ->label(__('Mark as read'))
                    ->icon('eos-mark-email-read')
                    ->visible(function (DatabaseNotification $notification): bool {
                        return ! $notification->read_at;
                    })
                    ->action(function (DatabaseNotification $notification) {
                        $notification->update(['read_at' => now()]);
                    })
                    ->extraAttributes([
                        'class' => 'fi-ta-visit-record-action-btn tooltip',
                        'title' => __('Mark as read'),
                    ])
                    ->button(),
                //                ]),

            ]);
    }

    #[On('markedNotificationAsUnread')]
    public function markNotificationAsUnread(string $id): void
    {
        $this->getNotificationsQuery()
            ->where('id', $id)
            ->update(['read_at' => null]);
    }

    public function render()
    {
        return view('core::livewire.auth.notifications')
            ->layout(AppLayouts::class, [
                'pageTitle' => __('Notifications'),
                'breadcrumbs' => [
                    route('dashboard.home') => __('Home'),
                    route('dashboard.account.profile') => __('Profile'),
                    route('dashboard.account.notifications') => __('Notifications'),
                ],
            ]);
    }
}
