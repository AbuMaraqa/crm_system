<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 4/16/24, 11:21 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\GeoLocation\Livewire\Pages\Settings;

use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Infolists\Concerns\InteractsWithInfolists;
use Filament\Infolists\Contracts\HasInfolists;
use Filament\Notifications\Notification;
use Livewire\Component;
use Modules\Core\Services\Settings\ApplicationSettings;
use Modules\Core\View\Components\AppLayouts;
use Modules\GeoLocation\Entities\Country;

class GeoLocationSettingsPage extends Component implements HasForms, HasInfolists
{
    use InteractsWithForms;
    use InteractsWithInfolists;

    public ?array $data = [];

    public function mount(ApplicationSettings $applicationSettings)
    {
        $this->fillForm($applicationSettings);
    }

    private function fillForm(ApplicationSettings $applicationSettings): void
    {
        $this->form->fill([
            'app_phone_initial_country' => $applicationSettings->getValue('app_phone_initial_country'),
            'app_location_initial_country' => $applicationSettings->getValue('app_location_initial_country'),
        ]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make(__('Geolocation Settings'))
                    ->icon('ri-map-pin-2-fill')
                    ->iconColor('danger')
                    ->columns([
                        'default' => 12,
                        'lg' => 12,
                    ])
                    ->schema([

                        Select::make('app_phone_initial_country')
                            ->label(__('Phone Initial Country'))
                            ->columnSpan([
                                'default' => 12,
                                'lg' => 6,
                            ])
                            ->options(
                                function (): array {

                                    $countries = Country::take(50)->get();

                                    $options = [];

                                    foreach ($countries as $country) {
                                        $options[$country->code] = $country->renderAsHTML();
                                    }

                                    return $options;
                                }
                            )
                            ->getOptionLabelUsing(fn ($value): ?string => Country::where('code', $value)->first()?->renderAsHTML())
                            ->getSearchResultsUsing(function ($search): array {

                                $countries = Country::where(function ($query) use ($search) {
                                    $query->where('ar_common_name', 'like', "%$search%")
                                        ->orWhere('en_common_name', 'like', "%$search%");
                                })
                                    ->take(50)
                                    ->get();

                                $options = [];

                                foreach ($countries as $country) {
                                    $options[$country->code] = $country->renderAsHTML();
                                }

                                return $options;
                            })
                            ->allowHtml()
                            ->searchable()
                            ->required()
                            ->exists(Country::class, 'code'),

                        Select::make('app_location_initial_country')
                            ->label(__('Location Initial Country'))
                            ->columnSpan([
                                'default' => 12,
                                'lg' => 6,
                            ])
                            ->options(
                                function (): array {

                                    $countries = Country::take(50)->get();

                                    $options = [];

                                    foreach ($countries as $country) {
                                        $options[$country->code] = $country->renderAsHTML();
                                    }

                                    return $options;
                                }
                            )
                            ->getOptionLabelUsing(fn ($value): ?string => Country::where('code', $value)->first()?->renderAsHTML())
                            ->getSearchResultsUsing(function ($search): array {

                                $countries = Country::where(function ($query) use ($search) {
                                    $query->where('ar_common_name', 'like', "%$search%")
                                        ->orWhere('en_common_name', 'like', "%$search%");
                                })
                                    ->take(50)
                                    ->get();

                                $options = [];

                                foreach ($countries as $country) {
                                    $options[$country->code] = $country->renderAsHTML();
                                }

                                return $options;
                            })
                            ->allowHtml()
                            ->searchable()
                            ->required()
                            ->exists(Country::class, 'code'),

                    ]),

            ])
            ->statePath('data');
    }

    public function save(ApplicationSettings $applicationSettings)
    {
        $this->authorize('dashboard.settings.geolocation');

        $this->validate();

        $data = $this->form->getState();

        if ($data['app_phone_initial_country']) {
            $applicationSettings->set('app_phone_initial_country', $data['app_phone_initial_country']);
        }

        if ($data['app_location_initial_country']) {
            $applicationSettings->set('app_location_initial_country', $data['app_location_initial_country']);
        }

        Notification::make()
            ->title(__('Saved Successfully.'))
            ->success()
            ->send();
    }

    public function render()
    {
        return view('geolocation::livewire.pages.settings.geolocation-settings-page')
            ->layout(AppLayouts::class, [
                'pageTitle' => __('Geolocation Settings'),
                'breadcrumbs' => [
                    route('dashboard.home') => __('Home'),
                    route('dashboard.settings.geolocation') => __('Geolocation Settings'),
                ],

            ]);
    }
}
