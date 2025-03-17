<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 4/24/24, 8:59 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\GeoLocation\Livewire\Pages\Cities;

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
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Modules\Core\Filament\Tables\Actions\ActivitiesAction;
use Modules\Core\Filament\Tables\Columns\EventAtColumn;
use Modules\Core\View\Components\AppLayouts;
use Modules\GeoLocation\Entities\City;

class Index extends Component implements HasForms, HasTable
{
    use InteractsWithForms;
    use InteractsWithTable;

    public function table(Table $table): Table
    {
        return $table
            ->heading(__('Cities'))
            ->query(City::with(['country', 'governorate']))
            ->columns([

                TextColumn::make('country')
                    ->label(__('Country'))
                    ->formatStateUsing(function (City $city): string {
                        return $city->renderAsTableColumn();
                    })
                    ->html()
                    ->wrap()
                    ->searchable(true, function (Builder $query, string $search): Builder {
                        return $query->where(function (Builder $query) use ($search) {
                            $query
                                ->whereRelation('country', 'en_common_name', 'like', "%$search%")
                                ->orWhereRelation('country', 'ar_common_name', 'like', "%$search%");
                        });
                    }),

                TextColumn::make('ar_name')
                    ->label(__('Arabic Name'))
                    ->action($this->viewAction())
                    ->color('info')
                    ->icon('heroicon-m-eye')
                    ->wrap()
                    ->searchable()
                    ->sortable(),

                TextColumn::make('en_name')
                    ->label(__('English Name'))
                    ->action($this->viewAction())
                    ->color('info')
                    ->icon('heroicon-m-eye')
                    ->wrap()
                    ->searchable()
                    ->sortable(),

                TextColumn::make('districts_count')
                    ->label(__('Districts'))
                    ->color('info')
                    ->formatStateUsing(function (City $city): string {
                        return "(" . $city->districts_count . ') ' . __('District');
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
                    ->url(fn (City $city): string => route('dashboard.geolocation.cities.edit', $city->id))
                    ->visible(fn (): bool => auth()->user()->can('edit_city'))
                    ->editActionCommonConfiguration(),

                DeleteAction::make()
                    ->modalHeading(__('Delete City'))
                    ->visible(function (City $city): bool {
                        return auth()->user()->can('delete_city') &&
                            ! $city->deleted_at;
                    })
                    ->deleteActionCommonConfiguration(),

                RestoreAction::make()
                    ->modalHeading(__('Restore City'))
                    ->visible(function (City $city): bool {
                        return auth()->user()->can('restore_city') &&
                            $city->deleted_at;
                    })
                    ->restoreActionCommonConfiguration(),

            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make('DeleteBulkAction')
                        ->modalHeading(__('Delete selected cities'))
                        ->visible(fn (): bool => auth()->user()->can('dashboard.geolocation.cities.delete')),
                ])
                    ->visible(fn (): bool => auth()->user()->canany(['delete_city'])),

            ])
            ->headerActions([
                CreateAction::make('create')
                    ->label(__('Create City'))
                    ->url(route('dashboard.geolocation.cities.create'))
                    ->visible(fn (): bool => auth()->user()->can('create_city'))
                    ->extraAttributes([
                        'class' => 'fi-ta-create-action-btn',
                    ])
                    ->button(),

            ])
            ->emptyStateDescription(__('Create a city to get started.'));
    }

    private function viewAction(): ViewAction
    {
        return ViewAction::make('view')
            ->visible(fn (): bool => auth()->user()->can('dashboard.geolocation.cities.view'))
            ->modalHeading(__('City'))
            ->modalWidth(MaxWidth::Large)
            ->infolist([

                TextEntry::make('country')
                    ->label(__('Country'))
                    ->inlineLabel()
                    ->placeholder(__('Not added yet'))
                    ->state(function (City $city): ?string {
                        return $city->country?->getCommonName();
                    }),

                TextEntry::make('governorate')
                    ->label(__('Governorate'))
                    ->inlineLabel()
                    ->placeholder(__('Not added yet'))
                    ->state(function (City $city): ?string {
                        return $city->governorate?->getName();
                    }),

                TextEntry::make('en_name')
                    ->label(__('English Name'))
                    ->inlineLabel(),

                TextEntry::make('ar_name')
                    ->label(__('Arabic Name'))
                    ->inlineLabel(),

                TextEntry::make('code')
                    ->label(__('Code'))
                    ->inlineLabel(),

            ])
            ->viewActionCommonConfiguration();
    }

    public function render()
    {

        return view('geolocation::livewire.pages.cities.index')
            ->layout(AppLayouts::class, [
                'pageTitle' => __('Cities'),
                'breadcrumbs' => [
                    route('dashboard.home') => __('Home'),
                    route('dashboard.geolocation.cities') => __('Cities'),
                ],
            ]);
    }
}
