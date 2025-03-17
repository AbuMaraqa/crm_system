<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 4/16/24, 11:21 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\GeoLocation\Livewire\Pages\Districts;

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
use Modules\GeoLocation\Entities\District;

class Index extends Component implements HasForms, HasTable
{
    use InteractsWithForms;
    use InteractsWithTable;

    public function table(Table $table): Table
    {
        return $table
            ->heading(__('Districts'))
            ->query(District::with(['country', 'governorate', 'city']))
            ->columns([

                TextColumn::make('country')
                    ->label(__('Country'))
                    ->formatStateUsing(function (District $district): string {
                        return $district->renderAsTableColumn();
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
                    ->url(fn (District $district): string => route('dashboard.geolocation.districts.edit', $district->id))
                    ->visible(fn (): bool => auth()->user()->can('edit_district'))
                    ->editActionCommonConfiguration(),

                DeleteAction::make()
                    ->modalHeading(__('Delete District'))
                    ->visible(function (District $district): bool {
                        return auth()->user()->can('delete_district') &&
                            ! $district->deleted_at;
                    })
                    ->deleteActionCommonConfiguration(),

                RestoreAction::make()
                    ->modalHeading(__('Restore District'))
                    ->visible(function (District $district): bool {
                        return auth()->user()->can('restore_district') &&
                            $district->deleted_at;
                    })
                    ->restoreActionCommonConfiguration(),

            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make('DeleteBulkAction')
                        ->modalHeading(__('Delete selected districts'))
                        ->visible(fn (): bool => auth()->user()->can('delete_district')),
                ])
                    ->visible(fn (): bool => auth()->user()->canany(['delete_district'])),

            ])
            ->headerActions([
                CreateAction::make('create')
                    ->label(__('Create District'))
                    ->url(route('dashboard.geolocation.districts.create'))
                    ->visible(fn (): bool => auth()->user()->can('create_district'))
                    ->extraAttributes([
                        'class' => 'fi-ta-create-action-btn',
                    ])
                    ->button(),

            ])
            ->emptyStateDescription(__('Create a district to get started.'));
    }

    private function viewAction(): ViewAction
    {
        return ViewAction::make('view')
            ->visible(fn (): bool => auth()->user()->can('access_district_details'))
            ->modalHeading(__('District'))
            ->modalWidth(MaxWidth::Large)
            ->infolist([
                TextEntry::make('country')
                    ->label(__('Country'))
                    ->inlineLabel()
                    ->state(function (District $district): ?string {
                        return $district->country?->getCommonName();
                    }),

                TextEntry::make('governorate')
                    ->label(__('Governorate'))
                    ->inlineLabel()
                    ->state(function (District $district): ?string {
                        return $district->governorate?->getName();
                    }),
                TextEntry::make('city')
                    ->label(__('City'))
                    ->inlineLabel()
                    ->state(function (District $district): ?string {
                        return $district->city?->getName();
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

        return view('geolocation::livewire.pages.districts.index')
            ->layout(AppLayouts::class, [
                'pageTitle' => __('Districts'),
                'breadcrumbs' => [
                    route('dashboard.home') => __('Home'),
                    route('dashboard.geolocation.districts') => __('Districts'),
                ],
            ]);
    }
}
