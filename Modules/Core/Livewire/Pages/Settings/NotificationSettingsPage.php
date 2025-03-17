<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/23/24, 9:35 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Livewire\Pages\Settings;

use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Infolists\Concerns\InteractsWithInfolists;
use Filament\Infolists\Contracts\HasInfolists;
use Filament\Notifications\Notification;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Modules\Core\Services\Settings\ApplicationSettings;
use Modules\Core\Traits\HasFormControlButtons;
use Modules\Core\View\Components\AppLayouts;

class NotificationSettingsPage extends Component implements HasForms, HasInfolists
{
    use HasFormControlButtons;
    use InteractsWithForms;
    use InteractsWithInfolists;

    public array $data = [];

    public function mount(ApplicationSettings $applicationSettings)
    {
        $this->fillForm($applicationSettings);
    }

    public function fillForm(ApplicationSettings $applicationSettings): void
    {
        $this->form->fill([
            'notifications_displayed_count'  => $applicationSettings->getValue('notifications_displayed_count', 15),
            'notifications_multiple_pages'   => $applicationSettings->getValue('notifications_multiple_pages', true),
            'notifications_auto_update'      => $applicationSettings->getValue('notifications_auto_update', true),
            'notifications_polling_interval' => $applicationSettings->getValue('notifications_polling_interval', 30),
        ]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make(__('Notification Settings'))
                    ->icon('heroicon-o-bell')
                    ->iconColor('primary')
                    ->schema([
                        TextInput::make('notifications_displayed_count')
                            ->label(__('Notifications Displayed Count'))
                            ->inlineLabel()
                            ->required()
                            ->numeric(),

                        Toggle::make('notifications_multiple_pages')
                            ->label(__('Multiple Pages'))
                            ->inlineLabel()
                            ->required(),

                        Toggle::make('notifications_auto_update')
                            ->label(__('Auto Update'))
                            ->live()
                            ->inlineLabel()
                            ->required(),

                        TextInput::make('notifications_polling_interval')
                            ->label(__('Update Notifications Automatically Every'))
                            ->inlineLabel()
                            ->suffix(__('Second'))
                            ->disabled(function (Get $get) {
                                return !(bool)$get('notifications_auto_update');
                            })
                            ->required()
                            ->numeric()
                            ->minValue(10),

                    ]),

            ])
            ->statePath('data');
    }

    /**
     * @return void
     */
    protected function redirectToIntendedRoute(): void
    {
        $this->redirectRoute('dashboard.settings.notification');
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
        $this->authorize('dashboard.settings.notification');

        $this->validate();

        $data = $this->form->getState();

        $applicationSettings->set('notifications_displayed_count', $data['notifications_displayed_count']);
        $applicationSettings->set('notifications_multiple_pages', $data['notifications_multiple_pages']);
        $applicationSettings->set('notifications_auto_update', $data['notifications_auto_update']);

        if ((bool)$data['notifications_auto_update']) {
            $applicationSettings->set('notifications_polling_interval', $data['notifications_polling_interval']);
        }

        $this->fillForm($applicationSettings);

        Notification::make()
            ->title(__('Saved Successfully.'))
            ->success()
            ->send();
    }

    public function render()
    {
        return view('core::livewire.pages.settings.notification-settings-page')
            ->layout(AppLayouts::class, [
                'pageTitle'   => __('Notification Settings'),
                'breadcrumbs' => [
                    route('dashboard.home')                  => __('Home'),
                    route('dashboard.settings.notification') => __('Notification Settings'),
                ],
            ]);
    }
}
