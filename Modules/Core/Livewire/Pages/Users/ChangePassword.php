<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/2/24, 9:34 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Livewire\Pages\Users;

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

    public int $userID;

    public array $data = [];

    /**
     * @param $user
     *
     * @return void
     */
    public function mount($user): void
    {
        $this->userID = $user;
        $this->fillForm();
    }

    /**
     * @return mixed
     */
    #[Computed()]
    public function user(): mixed
    {
        return User::findOrFail($this->userID);
    }

    /**
     * @return void
     */
    private function fillForm(): void
    {
        $this->form->fill([]);
    }

    /**
     * @param Form $form
     *
     * @return Form
     */
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

                        TextInput::make('new_password')
                            ->label(__('New Password'))
                            ->columnSpan(12)
                            ->required()
                            ->confirmed()
                            ->string()
                            ->password()
                            ->revealable()
                            ->maxLength(255),

                        TextInput::make('new_password_confirmation')
                            ->label(__('New Password Confirmation'))
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
     * @throws AuthorizationException
     * @throws ValidationException
     */
    public function saving(): void
    {
        $this->authorize('dashboard.user_management.users.change_password');

        $this->validate();

        QueryContainer::make()
            ->wrap(function () {

                $data = $this->form->getState();

                $this->user->password = $data['new_password'];
                $this->user->save();

                Notification::make()
                    ->title(__('Password Changed Sucessfully.'))
                    ->success()
                    ->send();

                $this->fillForm();
            });
    }

    /**
     * @return void
     */
    protected function redirectToIntendedRoute(): void
    {
        $this->redirectRoute('dashboard.user_management.users');
    }

    public function render()
    {
        return view('core::livewire.pages.users.change-password')
            ->layout(AppLayouts::class, [
                'pageTitle'   => __('Change Password'),
                'breadcrumbs' => [
                    route('dashboard.home')                                                     => __('Home'),
                    route('dashboard.user_management.users')                                    => __('Users'),
                    route('dashboard.user_management.users.change_password', [$this->user->id]) => __('Change Password'),
                ],
            ]);
    }
}
