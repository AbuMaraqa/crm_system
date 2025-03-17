<?php

namespace Modules\Money\Livewire\Pages\Settings;

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

class MoneySettingsPage extends Component implements HasForms, HasInfolists
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
            'app_currency' => $applicationSettings->getValue('app_currency'),
        ]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make(__('Money Settings'))
                    ->icon('ri-money-dollar-circle-fill')
                    ->iconColor('warning')
                    ->columns([
                        'default' => 12,
                        'lg' => 12,
                    ])
                    ->schema([

                        Select::make('app_currency')
                            ->label(__('Currency'))
                            ->columnSpan([
                                'default' => 12,
                                'lg' => 6,
                            ])
                            ->options(
                                function (): array {

                                    $countries = Country::take(50)->get();

                                    $options = [];

                                    foreach ($countries as $country) {
                                        $options[$country->currency_code] = $country->currency_code;
                                    }

                                    return $options;
                                }
                            )
                            ->getOptionLabelUsing(fn ($value): ?string => Country::where('code', $value)->first()?->currency_code)
                            ->getSearchResultsUsing(function ($search): array {

                                $countries = Country::where(function ($query) use ($search) {
                                    $query->where('ar_common_name', 'like', "%$search%")
                                        ->orWhere('en_common_name', 'like', "%$search%");
                                })
                                    ->take(50)
                                    ->get();

                                $options = [];

                                foreach ($countries as $country) {
                                    $options[$country->currency_code] = $country->currency_code;
                                }

                                return $options;
                            })
                            ->allowHtml()
                            ->searchable()
                            ->required()
                            ->exists(Country::class, 'currency_code'),

                    ]),

            ])
            ->statePath('data');
    }

    public function save(ApplicationSettings $applicationSettings)
    {
        $this->authorize('access_money_settings');

        $this->validate();

        $data = $this->form->getState();

        if ($data['app_currency']) {
            $applicationSettings->set('app_currency', $data['app_currency']);
        }

        Notification::make()
            ->title(__('Saved Successfully.'))
            ->success()
            ->send();
    }

    public function render()
    {
        return view('money::livewire.pages.settings.money-settings-page')
            ->layout(AppLayouts::class, [
                'pageTitle' => __('Money Settings'),
                'breadcrumbs' => [
                    route('dashboard.home') => __('Home'),
                    route('dashboard.settings.money') => __('Money Settings'),
                ],

            ]);
    }
}
