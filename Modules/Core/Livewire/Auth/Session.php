<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/2/24, 9:34 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Livewire\Auth;

use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Modules\Core\Entities\Session as EntitiesSession;
use Modules\Core\Entities\User;
use Modules\Core\View\Components\AppLayouts;

class Session extends Component implements HasForms, HasTable
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
            ->heading(__('Device History'))
            ->relationship(fn (): HasMany => $this->user->sessions())
            ->columns([

                TextColumn::make('ip_address')
                    ->label(__('IP'))
                    ->copyable()
                    ->searchable()
                    ->sortable(),

                TextColumn::make('user_agent')
                    ->label(__('User Agents'))
                    ->description(fn (EntitiesSession $session): string => $session->getParsedUserAgent())
                    ->wrap()
                    ->searchable()
                    ->sortable(),

                TextColumn::make('last_activity')
                    ->label(__('Last Activity'))
                    ->extraAttributes(['class' => 'last-activity-cell'])
                    ->since(),

            ])
            ->headerActions([
                Action::make('LogoutFromAllOtherDevices')
                    ->label(__('Logout From All Other Devices'))
                    ->icon('heroicon-m-arrow-right-on-rectangle')
                    ->visible(fn (): bool => auth()->user()->can('dashboard.account.sessions.logout_from_all_other_devices'))
                    ->color('success')
                    ->requiresConfirmation()
                    ->action(function () {
                        $sessionID = session()->getId();
                        $this->user->sessions()->where('id', '!=', $sessionID)->delete();

                        Notification::make()
                            ->title(__('Logout Successfully.'))
                            ->success()
                            ->send();
                    })
                    ->extraAttributes([
                        'class' => 'fi-ta-logout-from-all-devices-action-btn',
                    ])
                    ->button(),

            ])
            ->filters([
                // ...
            ])
            ->defaultSort('last_activity');
    }

    public function render()
    {
        return view('core::livewire.auth.sessions')
            ->layout(AppLayouts::class, [
                'pageTitle' => __('Device History'),
                'breadcrumbs' => [
                    route('dashboard.home') => __('Home'),
                    route('dashboard.account.profile') => __('Profile'),
                    route('dashboard.account.sessions') => __('Sessions'),
                ],
            ]);
    }
}
