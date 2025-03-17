<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Livewire\Auth;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Modules\Core\Custom\Auth\Password\Enums\PasswordResetStatus;
use Modules\Core\Custom\Auth\Password\Password;
use Modules\Core\Custom\Query\QueryContainer;
use Modules\Core\Services\Settings\ApplicationSettings;
use Modules\Core\View\Components\AuthLayouts;

class ResetPassword extends Component implements HasForms
{
    use InteractsWithForms;

    #[Rule('required')]
    public string $token;

    public ?array $data = [];

    public ?string $logoUrl = null;

    public function mount($token)
    {
        $this->token = $token;
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('email')
                    ->label(__('Email'))
                    ->required()
                    ->string()
                    ->email()
                    ->maxLength(255),
                TextInput::make('password')
                    ->label(__('Password'))
                    ->required()
                    ->string()
                    ->password()
                    ->confirmed()
                    ->maxLength(255),
                TextInput::make('password_confirmation')
                    ->label(__('Password Confirmation'))
                    ->required()
                    ->string()
                    ->password()
                    ->maxLength(255),

            ])->statePath('data');
    }

    public function resetPassword()
    {
        $this->validate();

        $status = (new Password)->reset(
            [
                'email' => $this->form->getState()['email'],
                'password' => $this->form->getState()['password'],
                'password_confirmation' => $this->form->getState()['password_confirmation'],
                'token' => $this->token,
            ],
            function ($user) {
                QueryContainer::make()
                    ->wrap(function () use ($user) {

                        $user->forceFill([
                            'password' => bcrypt($this->form->getState()['password']),
                            'remember_token' => Str::random(60),
                        ])->save();

                        activity()
                            ->useLog('Core')
                            ->performedOn($user)
                            ->event('Password Reset')
                            ->log('User reset password successfully.');

                        event(new PasswordReset($user));
                    });
            }
        );

        if ($status == PasswordResetStatus::PASSWORD_RESET) {
            redirect()
                ->route('dashboard.login')
                ->with('success', __($status->value));
        } else {

            Notification::make()
                ->title(__($status->value))
                ->danger()
                ->send();
        }
    }

    public function render()
    {
        $applicationSettings = app(ApplicationSettings::class);
        $this->logoUrl       = $applicationSettings->getUrl('ltr_dark_site_logo', 'website-logo', 'logo-lg');

        if (app()->getLocale() == 'ar') {
            $this->logoUrl = $applicationSettings->getUrl('rtl_dark_site_logo', 'website-logo', 'logo-lg');
        }

        return view('core::livewire.auth.reset-password')
            ->layout(AuthLayouts::class, ['pageTitle' => __('Reset Password')]);
    }
}
