<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 4/16/24, 11:21 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\GeoLocation\Livewire\Pages\Countries;

use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Notifications\Notification;
use Illuminate\Validation\Rules\Exists;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Modules\Core\Custom\Query\QueryContainer;
use Modules\Core\View\Components\AppLayouts;
use Modules\GeoLocation\Entities\City;
use Modules\GeoLocation\Entities\Country;

class Edit extends Component implements HasForms
{
    use InteractsWithForms;

    #[Locked]
    public int $countryID;

    public ?array $data = [];

    #[Computed()]
    public function country(): Country
    {
        return Country::findOrFail($this->countryID);
    }

    public function mount($country)
    {
        $this->countryID = $country;

        $this->fillFrom();
    }

    private function fillFrom(): void
    {
        $this->form->fill($this->country->toArray());
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make()
                    ->columns([
                        'default' => 12,
                        'lg' => 12,
                    ])
                    ->schema([
                        Section::make(__('Basic Info'))
                            ->columnSpan([
                                'default' => 12,
                                'xl' => 8,
                            ])
                            ->columns(12)
                            ->schema([

                                TextInput::make('en_common_name')
                                    ->label(__('English Common Name'))
                                    ->placeholder('Palestine')
                                    ->columnSpan([
                                        'default' => 12,
                                        'xl' => 6,
                                    ])
                                    ->required()
                                    ->maxLength(255),

                                TextInput::make('ar_common_name')
                                    ->label(__('Arabic Common Name'))
                                    ->placeholder('فلسطين')
                                    ->columnSpan([
                                        'default' => 12,
                                        'xl' => 6,
                                    ])
                                    ->required()
                                    ->maxLength(255),

                                TextInput::make('en_official_name')
                                    ->label(__('English Official Name'))
                                    ->placeholder('State of Palestine')
                                    ->columnSpan([
                                        'default' => 12,
                                        'xl' => 6,
                                    ])
                                    ->required()
                                    ->maxLength(255),

                                TextInput::make('ar_official_name')
                                    ->label(__('Arabic Official Name'))
                                    ->placeholder('دولة فلسطين')
                                    ->columnSpan([
                                        'default' => 12,
                                        'xl' => 6,
                                    ])
                                    ->required()
                                    ->maxLength(255),

                                TextInput::make('code')
                                    ->label(__('Code'))
                                    ->placeholder('PS')
                                    ->columnSpan([
                                        'default' => 12,
                                        'xl' => 6,
                                    ])
                                    ->required()
                                    ->unique(Country::class, 'code', $this->country)
                                    ->maxLength(4),

                                TextInput::make('phone_code')
                                    ->label(__('Phone Code'))
                                    ->placeholder('+970')
                                    ->columnSpan([
                                        'default' => 12,
                                        'xl' => 6,
                                    ])
                                    ->required()
                                    ->maxLength(10),

                            ]),

                        Section::make(__('Secondary Information'))
                            ->columnSpan([
                                'default' => 12,
                                'xl' => 4,
                            ])
                            ->schema([

                                Select::make('continent')
                                    ->label(__('Continent'))
                                    ->options(Country::getContinentAsOptions())
                                    ->native(false)
                                    ->required()
                                    ->in(array_keys(Country::getContinentAsOptions())),

                                Select::make('capital_id')
                                    ->label(__('Capital'))
                                    ->options(
                                        function (Get $get): array {
                                            $cities = City::where('country_id', $this->country->id)
                                                ->take(50)
                                                ->get();

                                            $options = [];

                                            foreach ($cities as $city) {
                                                $options[$city->id] = $city->getName();
                                            }

                                            return $options;
                                        }
                                    )
                                    ->getOptionLabelUsing(fn ($value): ?string => City::find($value)?->getName())
                                    ->getSearchResultsUsing(function (string $search, Get $get): array {

                                        $cities = City::where('country_id', $this->country->id)
                                            ->where(function ($query) use ($search) {
                                                $query->where('ar_name', 'like', "%$search%")
                                                    ->orWhere('en_name', 'like', "%$search%");
                                            })
                                            ->take(50)
                                            ->get();

                                        $options = [];

                                        foreach ($cities as $city) {
                                            $options[$city->id] = $city->getName();
                                        }

                                        return $options;
                                    })
                                    ->searchable()
                                    ->preload()
                                    ->nullable()
                                    ->exists(City::class, 'id', function (Exists $rule) {
                                        return $rule->where('country_id', $this->country->id);
                                    }),

                            ]),

                    ]),
            ])->statePath('data');
    }

    public function save()
    {
        $this->authorize('edit_country');

        $this->validate();

        QueryContainer::make()
            ->wrap(function () {

                $data = $this->form->getState();

                $this->country->update($data);

                Notification::make()
                    ->title(__('Saved Successfully.'))
                    ->success()
                    ->send();

                $this->fillFrom();
            });
    }

    public function render()
    {

        return view('geolocation::livewire.pages.countries.edit')
            ->layout(AppLayouts::class, [
                'pageTitle' => __('Edit Country'),
                'breadcrumbs' => [
                    route('dashboard.home') => __('Home'),
                    route('dashboard.geolocation.countries') => __('Countries'),
                    route('dashboard.geolocation.countries.edit', $this->country->id) => __('Edit Country'),
                ],
            ]);
    }
}
