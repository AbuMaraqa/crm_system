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
use Livewire\Component;
use Modules\Core\Custom\Auth\Password\Password;
use Modules\Core\Custom\Query\QueryContainer;
use Modules\Core\Entities\User;
use Modules\Core\Services\Settings\ApplicationSettings;
use Modules\Core\View\Components\AuthLayouts;

class ForgotPassword extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public ?string $logoUrl = null;

    public function mount(): void
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
                TextInput::make('email')
                    ->label(__('Email'))
                    ->required()
                    ->string()
                    ->email()
                    ->maxLength(255),

            ])->statePath('data');
    }

    public function recover()
    {
        $this->validate();

        $status = (new Password)->sendResetEmail(['email' => $this->data['email']]);

        $user = User::where('email', $this->data['email'])->first();

        if ($user) {
            QueryContainer::make()
                ->wrap(function () use ($user) {
                    activity()
                        ->useLog('Core')
                        ->performedOn($user)
                        ->event('Password Reset Request')
                        ->log('Reset password link sent to user email.');
                });
        }

        Notification::make()
            ->title(__($status->value))
            ->info()
            ->send();
    }

    public function render()
    {
        $applicationSettings = app(ApplicationSettings::class);
        $this->logoUrl       = $applicationSettings->getUrl('ltr_dark_site_logo', 'website-logo', 'logo-lg');

        if (app()->getLocale() == 'ar') {
            $this->logoUrl = $applicationSettings->getUrl('rtl_dark_site_logo', 'website-logo', 'logo-lg');
        }

        return view('core::livewire.auth.forgot-password')
            ->layout(AuthLayouts::class, ['pageTitle' => __('Forgot Password')]);
    }
}
