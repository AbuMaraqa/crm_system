<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/23/24, 9:35 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Livewire\Pages\Settings;

use Filament\Actions\Action;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Modules\Core\Emails\TestSmtp;
use Modules\Core\Services\Localization\Localization;
use Modules\Core\Services\Settings\ApplicationSettings;
use Modules\Core\Traits\HasFormControlButtons;
use Modules\Core\View\Components\AppLayouts;

class SmtpSettingsPage extends Component implements HasActions, HasForms
{
    use HasFormControlButtons;
    use InteractsWithActions;
    use InteractsWithForms;

    public array $data = [];

    public function mount(ApplicationSettings $applicationSettings)
    {
        $this->form->fill($applicationSettings->getArray('smtp_configs'));
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make(__('SMTP Settings'))
                    ->icon('ri-mail-settings-fill')
                    ->iconColor('warning')
                    ->columns([
                        'default' => 12,
                        'lg'      => 12,
                    ])
                    ->schema([

                        TextInput::make('host')
                            ->label(__('SMTP Host'))
                            ->columnSpan([
                                'default' => 12,
                                'md'      => 6,
                            ])
                            ->required()
                            ->string()
                            ->maxLength(255),
                        TextInput::make('port')
                            ->label(__('SMTP Port'))
                            ->columnSpan([
                                'default' => 12,
                                'md'      => 6,
                            ])
                            ->required()
                            ->string()
                            ->maxLength(255),
                        TextInput::make('username')
                            ->label(__('SMTP Username'))
                            ->columnSpan([
                                'default' => 12,
                                'md'      => 6,
                            ])
                            ->required()
                            ->string()
                            ->maxLength(255),
                        TextInput::make('password')
                            ->label(__('SMTP Password'))
                            ->columnSpan([
                                'default' => 12,
                                'md'      => 6,
                            ])
                            ->password()
                            ->revealable()
                            ->required()
                            ->string()
                            ->maxLength(255),
                        TextInput::make('encryption')
                            ->label(__('SMTP Encryption'))
                            ->columnSpan(12)
                            ->required()
                            ->string()
                            ->maxLength(255),
                        TextInput::make('name')
                            ->label(__('Sender Name'))
                            ->columnSpan([
                                'default' => 12,
                                'md'      => 6,
                            ])
                            ->required()
                            ->string()
                            ->maxLength(255),
                        TextInput::make('address')
                            ->label(__('Sender Email'))
                            ->columnSpan([
                                'default' => 12,
                                'md'      => 6,
                            ])
                            ->email()
                            ->required()
                            ->string()
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
        $this->redirectRoute('dashboard.settings.smtp');
    }

    /**
     *
     * @return void
     * @throws AuthorizationException
     * @throws ValidationException
     */
    public function saving(): void
    {
        $applicationSettings = app(ApplicationSettings::class);
        $this->authorize('dashboard.settings.smtp');

        $this->validate();

        $applicationSettings->set('smtp_configs', json_encode($this->form->getState()));

        Notification::make()
            ->title(__('Saved Successfully.'))
            ->success()
            ->send();
    }

    public function sendTestEmail(): Action
    {
        $this->authorize('dashboard.settings.smtp');

        return Action::make('sendTestEmail')
            ->label(__('Send Test Email'))
            ->icon('heroicon-m-paper-airplane')
            ->extraAttributes(['class' => 'send-test-email-button'])
            ->requiresConfirmation()
            ->form([
                TextInput::make('email')
                    ->label(__('Email'))
                    ->email()
                    ->required(),
            ])
            ->modalIcon('heroicon-m-signal')
            ->action(function (array $data) {

                Mail::to($data['email'])->locale(Localization::getCurrentLocale())
                    ->send(new TestSmtp([
                        'title'      => 'Test SMTP',
                        'greeting'   => 'Hello',
                        'introLines' => [
                            'We have sent you this email in response to your request to test SMTP',
                            'Tap the button below to return to dashboard.',
                        ],
                        'actionUrl'  => route('dashboard.home'),
                        'actionText' => 'Dashboard',

                    ]));

                Notification::make()
                    ->title(__('Sent Successfully.'))
                    ->success()
                    ->send();
            });
    }

    public function render()
    {

        return view('core::livewire.pages.settings.smtp-settings-page')
            ->layout(AppLayouts::class, [
                'pageTitle'   => __('SMTP Settings'),
                'breadcrumbs' => [
                    route('dashboard.home')          => __('Home'),
                    route('dashboard.settings.smtp') => __('SMTP Settings'),
                ],

            ]);
    }
}
