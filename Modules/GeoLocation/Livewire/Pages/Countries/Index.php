<?php

/*************************************************
 * Copyright (c) 2024.
 *
 * @Author : Shaker Awad <awadshaker74@gmail.com>
 * @Date   : 4/16/24, 11:21 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\GeoLocation\Livewire\Pages\Countries;

use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Infolists\Components\TextEntry;
use Filament\Support\Enums\MaxWidth;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\RestoreAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Livewire\Component;
use Modules\Core\Filament\Tables\Actions\ActivitiesAction;
use Modules\Core\Filament\Tables\Columns\EventAtColumn;
use Modules\Core\View\Components\AppLayouts;
use Modules\GeoLocation\Entities\Country;

class Index extends Component implements HasForms, HasTable
{
    use InteractsWithForms;
    use InteractsWithTable;

    public function table(Table $table): Table
    {
        return $table
            ->heading(__('Countries'))
            ->query(Country::with(['capitalCity']))
            ->columns([

                TextColumn::make('ar_common_name')
                    ->label(__('Arabic Name'))
                    ->formatStateUsing(function (Country $country): string {
                        return $country->renderAsTableColumn('ar');
                    })
                    ->action($this->viewAction())
                    ->html()
                    ->wrap()
                    ->searchable(['ar_common_name', 'ar_official_name'])
                    ->sortable(),

                TextColumn::make('en_common_name')
                    ->label(__('English Name'))
                    ->formatStateUsing(function (Country $country): string {
                        return $country->renderAsTableColumn('en');
                    })
                    ->action($this->viewAction())
                    ->html()
                    ->wrap()
                    ->searchable(['en_common_name', 'en_official_name'])
                    ->sortable(),

                TextColumn::make('capitalCity')
                    ->label(__('Capital'))
                    ->formatStateUsing(function (Country $country): string {
                        return $country->capitalCity->getName();
                    }),

                TextColumn::make('governorates_count')
                    ->label(__('Governorates'))
                    ->color('info')
                    ->formatStateUsing(function (Country $country): string {
                        return "(" . $country->governorates_count . ') ' . __('Governorate');
                    })
                    ->badge()
                    ->alignCenter()
                    ->counts('governorates'),

                TextColumn::make('cities_count')
                    ->label(__('Cities'))
                    ->color('info')
                    ->formatStateUsing(function (Country $country): string {
                        return "(" . $country->cities_count . ') ' . __('City');
                    })
                    ->badge()
                    ->alignCenter()
                    ->counts('cities'),

                TextColumn::make('districts_count')
                    ->label(__('Districts'))
                    ->color('info')
                    ->formatStateUsing(function (Country $country): string {
                        return "(" . $country->districts_count . ') ' . __('District');
                    })
                    ->badge()
                    ->alignCenter()
                    ->counts('districts'),

                EventAtColumn::make('created_at')
                    ->createdAt(),

                EventAtColumn::make('updated_at')
                    ->updatedAt(),

            ])
            ->filters([])
            ->actions([

                ActivitiesAction::make('activities'),

                $this->viewAction(),

                EditAction::make()
                    ->url(fn(Country $country): string => route('dashboard.geolocation.countries.edit', $country->id))
                    ->visible(fn(): bool => auth()->user()->can('edit_country'))
                    ->editActionCommonConfiguration(),

                DeleteAction::make()
                    ->modalHeading(__('Delete Country'))
                    ->visible(function (Country $country): bool {
                        return auth()->user()->can('delete_country') &&
                            !$country->deleted_at;
                    })
                    ->deleteActionCommonConfiguration(),

                RestoreAction::make()
                    ->modalHeading(__('Restore Country'))
                    ->visible(function (Country $country): bool {
                        return auth()->user()->can('restore_country') &&
                            $country->deleted_at;
                    })
                    ->restoreActionCommonConfiguration(),

            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make('DeleteBulkAction')
                        ->modalHeading(__('Delete selected countries'))
                        ->visible(fn(): bool => auth()->user()->can('delete_country')),
                ])
                    ->visible(fn(): bool => auth()->user()->canany(['delete_country'])),

            ])
            ->headerActions([
                CreateAction::make('create')
                    ->label(__('Create Country'))
                    ->url(route('dashboard.geolocation.countries.create'))
                    ->visible(fn(): bool => auth()->user()->can('create_country'))
                    ->extraAttributes([
                        'class' => 'fi-ta-create-action-btn',
                    ])
                    ->button(),

            ])
            ->emptyStateDescription(__('Create a country to get started.'));
    }

    private function viewAction(): ViewAction
    {
        return ViewAction::make('view')
            ->visible(fn(): bool => auth()->user()->can('access_country_details'))
            ->modalHeading(__('Country'))
            ->modalWidth(MaxWidth::Large)
            ->infolist([

                TextEntry::make('en_common_name')
                    ->label(__('English Common Name'))
                    ->inlineLabel(),

                TextEntry::make('ar_common_name')
                    ->label(__('Arabic Common Name'))
                    ->inlineLabel(),

                TextEntry::make('en_official_name')
                    ->label(__('English Official Name'))
                    ->inlineLabel(),

                TextEntry::make('ar_official_name')
                    ->label(__('Arabic Official Name'))
                    ->inlineLabel(),

                TextEntry::make('code')
                    ->label(__('Code'))
                    ->inlineLabel(),

                TextEntry::make('phone_code')
                    ->label(__('Phone Code'))
                    ->inlineLabel(),

                TextEntry::make('continent')
                    ->label(__('Continent'))
                    ->inlineLabel(),

                TextEntry::make('capitalCity')
                    ->label(__('Capital'))
                    ->inlineLabel()
                    ->state(function (Country $country): ?string {
                        return $country->capitalCity?->getName();
                    }),

            ])
            ->viewActionCommonConfiguration();
    }

    public function render()
    {

        return view('geolocation::livewire.pages.countries.index')
            ->layout(AppLayouts::class, [
                'pageTitle'   => __('Countries'),
                'breadcrumbs' => [
                    route('dashboard.home')                  => __('Home'),
                    route('dashboard.geolocation.countries') => __('Countries'),
                ],
            ]);
    }
}
