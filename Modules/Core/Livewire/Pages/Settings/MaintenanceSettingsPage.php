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
use Filament\Infolists\Concerns\InteractsWithInfolists;
use Filament\Infolists\Contracts\HasInfolists;
use Filament\Notifications\Notification;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Modules\Core\Filament\Forms\Components\Flatpickr;
use Modules\Core\Services\Settings\ApplicationSettings;
use Modules\Core\Traits\HasFormControlButtons;
use Modules\Core\View\Components\AppLayouts;

class MaintenanceSettingsPage extends Component implements HasForms, HasInfolists
{
    use HasFormControlButtons;
    use InteractsWithForms;
    use InteractsWithInfolists;

    public array $data = [];

    public function mount(ApplicationSettings $applicationSettings)
    {
        $this->form->fill([
            'is_maintenance_mode_for_website'   => $applicationSettings->getValue('is_maintenance_mode_for_website'),
            'is_maintenance_mode_for_dashboard' => $applicationSettings->getValue('is_maintenance_mode_for_dashboard'),
            //            'maintenance_mode_message'    => $applicationSettings->getValue('maintenance_mode_message'),
            'maintenance_mode_start_date'       => $applicationSettings->getValue('maintenance_mode_start_date'),
            'maintenance_mode_end_date'         => $applicationSettings->getValue('maintenance_mode_end_date'),
        ]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make(__('Maintenance Settings'))
                    ->icon('heroicon-s-shield-check')
                    ->iconColor('danger')
                    ->columns(12)
                    ->schema([
                        Toggle::make('is_maintenance_mode_for_website')
                            ->label(__('Close the site and activate maintenance mode'))
                            ->columnSpan(6)
                            ->required(),

                        Toggle::make('is_maintenance_mode_for_dashboard')
                            ->label(__('Close the dashboard and activate maintenance mode'))
                            ->columnSpan(6)
                            ->required(),

                        //                        TextInput::make('maintenance_mode_message')
                        //                            ->label(__('Maintenance Message'))
                        //                            ->default(__('Our platform is undergoing routine maintenance. We appreciate your work in patience and will be back online soon.'))
                        //                            ->columnSpan(12)
                        //                            ->requiredIf('is_maintenance_mode_for_website', true)
                        //                            ->string()
                        //                            ->maxLength(255),

                        Flatpickr::make('maintenance_mode_start_date')
                            ->label(__('Maintenance Start Date'))
                            ->enableTime()
                            ->columnSpan(6)
                            ->requiredIf('is_maintenance_mode_for_website', 'is_maintenance_mode_for_dashboard', true),

                        Flatpickr::make('maintenance_mode_end_date')
                            ->label(__('Maintenance End Date'))
                            ->enableTime()
                            ->columnSpan(6)
                            ->requiredIf('is_maintenance_mode_for_website', 'is_maintenance_mode_for_dashboard', true),
                    ]),

            ])
            ->statePath('data');
    }

    /**
     * @return void
     */
    protected function redirectToIntendedRoute(): void
    {
        $this->redirectRoute('dashboard.settings.maintenance');
    }

    /**
     * @return void
     * @throws AuthorizationException
     * @throws ValidationException
     */
    public function saving(): void
    {
        $applicationSettings = app(ApplicationSettings::class);
        $this->authorize('dashboard.settings.maintenance');

        $this->validate();

        $data = $this->form->getState();

        $applicationSettings->set('is_maintenance_mode_for_website', $data['is_maintenance_mode_for_website']);
        $applicationSettings->set('is_maintenance_mode_for_dashboard', $data['is_maintenance_mode_for_dashboard']);
        //        $applicationSettings->set('maintenance_mode_message', $data['maintenance_mode_message']);
        $applicationSettings->set('maintenance_mode_start_date', $data['maintenance_mode_start_date']);
        $applicationSettings->set('maintenance_mode_end_date', $data['maintenance_mode_end_date']);

        Notification::make()
            ->title(__('Saved Successfully.'))
            ->success()
            ->send();
    }

    /**
     * @return mixed
     */
    public function render(): mixed
    {
        return view('core::livewire.pages.settings.maintenance-settings-page')
            ->layout(AppLayouts::class, [
                'pageTitle'   => __('Maintenance Settings'),
                'breadcrumbs' => [
                    route('dashboard.home')                 => __('Home'),
                    route('dashboard.settings.maintenance') => __('Maintenance Settings'),
                ],
            ]);
    }
}
