<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/2/24, 9:34 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Livewire\Auth;

use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Modules\Core\Custom\Query\QueryContainer;
use Modules\Core\Entities\User;
use Modules\Core\Traits\HasFormControlButtons;
use Modules\Core\View\Components\AppLayouts;

class ChangePassword extends Component implements HasForms
{
    use HasFormControlButtons;
    use InteractsWithForms;

    public ?array $data = [];

    #[Computed()]
    public function user(): User
    {
        return auth()->user();
    }

    public function mount()
    {
        $this->fillForm();
    }

    public function fillForm(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make(__('Change Password'))
                    ->icon('heroicon-m-key')
                    ->iconColor('info')
                    ->columns([
                        'default' => 12,
                        'lg'      => 12,
                    ])
                    ->schema([

                        TextInput::make('old_password')
                            ->label(__('Old Password'))
                            ->prefixIcon('clarity-lock-solid')
                            ->columnSpan(12)
                            ->required()
                            ->string()
                            ->currentPassword()
                            ->password()
                            ->revealable()
                            ->maxLength(255),

                        TextInput::make('new_password')
                            ->label(__('New Password'))
                            ->prefixIcon('clarity-lock-solid')
                            ->columnSpan(12)
                            ->required()
                            ->confirmed()
                            ->string()
                            ->password()
                            ->revealable()
                            ->maxLength(255),

                        TextInput::make('new_password_confirmation')
                            ->label(__('New Password Confirmation'))
                            ->prefixIcon('clarity-lock-solid')
                            ->columnSpan(12)
                            ->required()
                            ->string()
                            ->password()
                            ->revealable()
                            ->maxLength(255),

                    ]),

            ])
            ->statePath('data');
    }

    /**
     * @return void
     */
    protected function redirectToIntendedRoute(): void
    {
        $this->redirectRoute('dashboard.account.profile');
    }

    /**
     * @return void
     * @throws AuthorizationException
     * @throws ValidationException
     */
    public function saving(): void
    {
        $this->authorize('dashboard.account.change_password');

        $this->validate();

        QueryContainer::make()
            ->wrap(function () {

                $data = $this->form->getState();

                $this->user->password = $data['new_password'];
                $this->user->save();
                $this->fillForm();

                activity()
                    ->useLog('Core')
                    ->performedOn($this->user)
                    ->event('Change Password')
                    ->log('User changed his password successfully.');

                Notification::make()
                    ->title(__('Password Changed Sucessfully.'))
                    ->success()
                    ->send();
            });
    }

    public function render()
    {
        return view('core::livewire.auth.change-password')
            ->layout(AppLayouts::class, [
                'pageTitle'   => __('Change Password'),
                'breadcrumbs' => [
                    route('dashboard.home')                    => __('Home'),
                    route('dashboard.account.profile')         => __('Profile'),
                    route('dashboard.account.change_password') => __('Change Password'),
                ],
            ]);
    }
}
