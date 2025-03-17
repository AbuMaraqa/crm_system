<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 4/16/24, 11:21 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\GeoLocation\Livewire\Pages\Districts;

use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Modules\Core\Custom\Query\QueryContainer;
use Modules\Core\View\Components\AppLayouts;
use Modules\GeoLocation\Entities\District;
use Modules\GeoLocation\Services\Render\GeolocationInputs;

class Edit extends Component implements HasForms
{
    use InteractsWithForms;

    #[Locked]
    public int $districtID;

    public ?array $data = [];

    #[Computed()]
    public function district(): District
    {
        return District::findOrFail($this->districtID);
    }

    public function mount($district)
    {
        $this->districtID = $district;

        $this->fillFrom();
    }

    private function fillFrom(): void
    {
        $this->form->fill($this->district->toArray());
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

                                TextInput::make('en_name')
                                    ->label(__('English Name'))
                                    ->columnSpan([
                                        'default' => 12,
                                        'xl' => 6,
                                    ])
                                    ->required()
                                    ->maxLength(255),

                                TextInput::make('ar_name')
                                    ->label(__('Arabic Name'))
                                    ->columnSpan([
                                        'default' => 12,
                                        'xl' => 6,
                                    ])
                                    ->required()
                                    ->maxLength(255),

                                TextInput::make('code')
                                    ->label(__('Code'))
                                    ->columnSpan([
                                        'default' => 12,
                                        'xl' => 6,
                                    ])
                                    ->nullable()
                                    ->maxLength(8),

                            ]),

                        Section::make(__('Secondary Information'))
                            ->columnSpan([
                                'default' => 12,
                                'xl' => 4,
                            ])
                            ->columns([
                                'default' => 4,
                                'md' => 12,
                                'lg' => 12,
                                'xl' => 12,
                            ])
                            ->schema(

                                GeolocationInputs::make()
                                    ->country('country_id', __('Country'), 12, true)
                                    ->governorate('governorate_id', __('Governorate'), 12, true)
                                    ->city('city_id', __('City'), 12, true)
                                    ->render()

                            ),

                    ]),
            ])->statePath('data');
    }

    public function save()
    {
        $this->authorize('edit_district');

        $this->validate();

        QueryContainer::make()
            ->wrap(function () {

                $data = $this->form->getState();

                $this->district->update($data);

                Notification::make()
                    ->title(__('Saved Successfully.'))
                    ->success()
                    ->send();

                $this->fillFrom();
            });
    }

    public function render()
    {

        return view('geolocation::livewire.pages.districts.edit')
            ->layout(AppLayouts::class, [
                'pageTitle' => __('Edit District'),
                'breadcrumbs' => [
                    route('dashboard.home') => __('Home'),
                    route('dashboard.geolocation.districts') => __('Districts'),
                    route('dashboard.geolocation.districts.edit', $this->district->id) => __('Edit District'),
                ],
            ]);
    }
}
