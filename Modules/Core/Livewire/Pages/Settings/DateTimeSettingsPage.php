<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/23/24, 9:35 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Livewire\Pages\Settings;

use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Infolists\Concerns\InteractsWithInfolists;
use Filament\Infolists\Contracts\HasInfolists;
use Filament\Notifications\Notification;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Modules\Core\Enums\DateFormat;
use Modules\Core\Enums\TimeFormat;
use Modules\Core\Services\Settings\ApplicationSettings;
use Modules\Core\Traits\HasFormControlButtons;
use Modules\Core\View\Components\AppLayouts;
use Tapp\FilamentTimezoneField\Forms\Components\TimezoneSelect;

class DateTimeSettingsPage extends Component implements HasForms, HasInfolists
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
            'timezone' => $applicationSettings->getValue('timezone'),
            'date_format' => $applicationSettings->getValue('date_format'),
            'time_format' => $applicationSettings->getValue('time_format'),
        ]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make(__('Date Time Settings'))
                    ->icon('heroicon-s-clock')
                    ->iconColor('primary')
                    ->schema([
                        TimezoneSelect::make('timezone')
                            ->label(__('Time Zone'))
                            ->inlineLabel()
                            ->searchable()
                            ->required(),

                        Select::make('date_format')
                            ->label(__('Date Format'))
                            ->inlineLabel()
                            ->columns(3)
                            ->options(DateFormat::class)
                            ->enum(DateFormat::class)
                            ->allowHtml()
                            ->native(false)
                            ->required(),

                        Select::make('time_format')
                            ->label(__('Time Format'))
                            ->inlineLabel()
                            ->columns(3)
                            ->options(TimeFormat::class)
                            ->enum(TimeFormat::class)
                            ->allowHtml()
                            ->native(false)
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
        $this->redirectRoute('dashboard.settings.datetime');
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
        $this->authorize('dashboard.settings.datetime');

        $this->validate();

        $data = $this->form->getState();

        $applicationSettings->set('timezone', $data['timezone']);
        $applicationSettings->set('datetime_format', "{$data['date_format']}  {$data['time_format']}");
        $applicationSettings->set('date_format', $data['date_format']);
        $applicationSettings->set('time_format', $data['time_format']);

        $this->fillForm($applicationSettings);

        Notification::make()
            ->title(__('Saved Successfully.'))
            ->success()
            ->send();
    }

    public function render()
    {
        return view('core::livewire.pages.settings.date-time-settings-page')
            ->layout(AppLayouts::class, [
                'pageTitle' => __('Date Time Settings'),
                'breadcrumbs' => [
                    route('dashboard.home') => __('Home'),
                    route('dashboard.settings.datetime') => __('Date Time Settings'),
                ],

            ]);
    }
}
