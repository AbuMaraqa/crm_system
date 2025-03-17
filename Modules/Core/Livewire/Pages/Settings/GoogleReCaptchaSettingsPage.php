<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/23/24, 9:35 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Livewire\Pages\Settings;

use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Modules\Core\Services\Settings\ApplicationSettings;
use Modules\Core\Traits\HasFormControlButtons;
use Modules\Core\View\Components\AppLayouts;

class GoogleReCaptchaSettingsPage extends Component implements HasActions, HasForms
{
    use HasFormControlButtons;
    use InteractsWithActions;
    use InteractsWithForms;

    public array $data = [];

    public function mount(ApplicationSettings $applicationSettings)
    {
        $this->form->fill($applicationSettings->getArray('google_recaptcha_configs'));
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make(__('Google ReCaptcha Settings'))
                    ->icon('ri-google-fill')
                    ->iconColor('primary')
                    ->schema([

                        TextInput::make('site_key')
                            ->label(__('Site Key'))
                            ->placeholder(__('e.g.') . ', 6Ld2iUYUAAAAADuQZegn1gE06zU_LfZ0YxYU6zI7')
                            ->required()
                            ->string()
                            ->maxLength(255),

                        TextInput::make('secret_key')
                            ->label(__('Secret Key'))
                            ->placeholder(__('e.g.') . ', 6Ld2iUYUAAAAADuQZegn1gE06zU_LfZ0YxYU6zI7')
                            ->required()
                            ->string()
                            ->password()
                            ->revealable()
                            ->maxLength(255),

                        Toggle::make('captcha_enable')
                            ->label(__('ReCaptcha Status'))
                            ->required(),

                    ]),

            ])
            ->statePath('data');
    }

    /**
     * @return void
     */
    protected function redirectToIntendedRoute(): void
    {
        $this->redirectRoute('dashboard.settings.google_recaptcha');
    }

    /**
     * @return void
     * @throws AuthorizationException
     * @throws ValidationException
     */
    public function saving(): void
    {
        $applicationSettings = app(ApplicationSettings::class);
        $this->authorize('dashboard.settings.google_recaptcha');

        $this->validate();

        $applicationSettings->set('google_recaptcha_configs', json_encode($this->form->getState()));

        Notification::make()
            ->title(__('Saved Successfully.'))
            ->success()
            ->send();
    }

    public function render()
    {
        return view('core::livewire.pages.settings.google-recaptcha-page')
            ->layout(AppLayouts::class, [
                'pageTitle'   => __('Google ReCaptcha Settings'),
                'breadcrumbs' => [
                    route('dashboard.home')                      => __('Home'),
                    route('dashboard.settings.google_recaptcha') => __('Google ReCaptcha Settings'),
                ],

            ]);
    }
}
