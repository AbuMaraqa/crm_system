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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule as ValidationRule;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Modules\Core\Custom\Query\QueryContainer;
use Modules\Core\Entities\User;
use Modules\Core\Services\Settings\ApplicationSettings;
use Modules\Core\View\Components\AuthLayouts;

class Login extends Component implements HasForms
{
    use InteractsWithForms;

    public ?string $username = null;

    public ?string $password = null;

    public ?string $captcha = null;

    public ?string $logoUrl = null;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('username')
                    ->label(__('Username'))
                    ->prefixIcon('heroicon-m-user')
                    ->required()
                    ->string()
                    ->maxLength(255),

                TextInput::make('password')
                    ->label(__('Password'))
                    ->prefixIcon('heroicon-m-key')
                    ->required()
                    ->string()
                    ->password()
                    ->revealable()
                    ->maxLength(255),
            ]);
    }

    public function rules()
    {
        return [
            'captcha' => ValidationRule::when(config('project.captcha_enable'), ['required', 'captcha'], ['nullable']),
        ];
    }

    public function login()
    {
        try {

            $this->validate(null, [
                'captcha.required' => __('Please verify you are not a robot.'),
                'captcha.captcha' => __('Please reverify you are not a robot.'),
            ]);
            $this->authenticate();
        } catch (\Illuminate\Validation\ValidationException $e) {

            $this->resetCaptcha();
            throw $e;
        }
    }

    private function getMutatedUsername(): string
    {
        $username = str_replace(' ', '', $this->username);

        $applicationSettings = app(ApplicationSettings::class);
        $initialCountry = $applicationSettings->getValue('app_phone_initial_country');
        $initialCountry = $initialCountry ? $initialCountry : 'PS';

        try {
            $username = phone($username, $initialCountry)->__toString();

            return $username;
        } catch (\Throwable $th) {
            return $username;
        }
    }

    private function resetCaptcha(): void
    {
        if (config('project.captcha_enable')) {
            $this->reset('captcha');
            $this->dispatch('resetCaptcha');
        }
    }

    public function authenticate(): void
    {
        $this->ensureIsNotRateLimited();

        $username = $this->getMutatedUsername();

        $user = User::where('email', $username)
            ->orWhere('phone_number', $username)
            ->first();

        if (
            Auth::attempt(['email' => $username, 'password' => $this->password]) ||
            Auth::attempt(['phone_number' => $username, 'password' => $this->password])
        ) {

            session()->regenerate();
            QueryContainer::make()
                ->wrap(function () {

                    activity()
                        ->useLog('Core')
                        ->causedBy(auth()->user())
                        ->event('Login Successfully')
                        ->log('Login Successfully');
                });

            RateLimiter::clear($this->throttleKey());

            $this->redirectIntended(route('dashboard.home'));
        } else {

            if ($user) {
                QueryContainer::make()
                    ->wrap(function () use ($user) {

                        activity()
                            ->useLog('Core')
                            ->performedOn($user)
                            ->event('Login Failed')
                            ->log('Login Failed');
                    });
            }

            Notification::make()
                ->title(__('Login Failed'))
                ->body(__('Username or Password is invalid'))
                ->danger()
                ->send();

            $this->resetCaptcha();

            RateLimiter::hit($this->throttleKey());

            return;
        }
    }

    public function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        $seconds = RateLimiter::availableIn($this->throttleKey());

        Notification::make()
            ->title(__('User Suspended'))
            ->body(trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]))
            ->danger()
            ->send();

        throw ValidationException::withMessages([]);
    }

    public function throttleKey(): string
    {
        $username = $this->getMutatedUsername();

        return Str::transliterate('login:'.Str::lower($username).'|'.request()->ip());
    }

    public function render()
    {
        $applicationSettings = app(ApplicationSettings::class);
        $this->logoUrl       = $applicationSettings->getUrl('ltr_dark_site_logo', 'website-logo', 'logo-lg');

        if (app()->getLocale() == 'ar') {
            $this->logoUrl = $applicationSettings->getUrl('rtl_dark_site_logo', 'website-logo', 'logo-lg');
        }

        return view('core::livewire.auth.login')
            ->layout(AuthLayouts::class, ['pageTitle' => __('Login')]);
    }
}
