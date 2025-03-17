<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/2/24, 9:34 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Livewire\Pages\Users;

use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Modules\Core\Custom\Query\QueryContainer;
use Modules\Core\Entities\Session;
use Modules\Core\Entities\User;
use Modules\Core\View\Components\AppLayouts;

class Sessions extends Component implements HasForms, HasTable
{
    use InteractsWithForms;
    use InteractsWithTable;

    #[Locked]
    public int $userID;

    #[Computed()]
    public function user(): User
    {
        return User::findOrFail($this->userID);
    }

    /**
     * @param $user
     *
     * @return void
     */
    public function mount($user): void
    {
        $this->userID = $user;
    }

    public function table(Table $table): Table
    {
        return $table
            ->heading(__('Sessions'))
            ->relationship(fn (): HasMany => $this->user->sessions())
            ->columns([

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
                    ->extraAttributes(['class' => 'last-activity-cell'])
                    ->since(),

            ])
            ->headerActions([
                Action::make('LogoutFromAllDevices')
                    ->label(__('Logout From All Devices'))
                    ->icon('heroicon-m-arrow-right-on-rectangle')
                    ->requiresConfirmation()
                    ->successNotificationTitle(__('Logout Successfully.'))
                    ->action(function () {
                        QueryContainer::make()
                            ->wrap(function () {
                                $this->user->sessions()->delete();

                                activity()
                                    ->useLog('Core')
                                    ->performedOn($this->user)
                                    ->event('User Logout')
                                    ->log('The user has been successfully logged out.');
                            });
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
        return view('core::livewire.pages.users.sessions')
            ->layout(AppLayouts::class, [
                'pageTitle' => __('Sessions'),
                'breadcrumbs' => [
                    route('dashboard.home') => __('Home'),
                    route('dashboard.user_management.users') => __('Users'),
                    route('dashboard.user_management.users.sessions', [$this->user->id]) => __('Sessions'),
                ],
            ]);
    }
}
