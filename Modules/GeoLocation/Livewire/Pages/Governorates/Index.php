<?php

/*************************************************
 * Copyright (c) 2024.
 *
 * @Author : Shaker Awad <awadshaker74@gmail.com>
 * @Date   : 4/24/24, 8:59 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\GeoLocation\Livewire\Pages\Governorates;

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
use Modules\GeoLocation\Entities\Governorate;

class Index extends Component implements HasForms, HasTable
{
    use InteractsWithForms;
    use InteractsWithTable;

    public function table(Table $table): Table
    {
        return $table
            ->heading(__('Governorates'))
            ->query(Governorate::with(['country']))
            ->columns([

                TextColumn::make('country')
                    ->label(__('Country'))
                    ->formatStateUsing(function (Governorate $governorate): string {
                        return $governorate->country->renderAsTableColumn(null, false);
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

                TextColumn::make('cities_count')
                    ->label(__('Cities'))
                    ->color('info')
                    ->formatStateUsing(function (Governorate $governorate): string {
                        return "(" . $governorate->cities_count . ') ' . __('City');
                    })
                    ->badge()
                    ->alignCenter()
                    ->counts('cities'),

                TextColumn::make('districts_count')
                    ->label(__('Districts'))
                    ->color('info')
                    ->formatStateUsing(function (Governorate $governorate): string {
                        return "(" . $governorate->districts_count . ') ' . __('District');
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
                    ->url(fn(Governorate $governorate): string => route('dashboard.geolocation.governorates.edit', $governorate->id))
                    ->visible(fn(): bool => auth()->user()->can('edit_governorate'))
                    ->editActionCommonConfiguration(),

                DeleteAction::make()
                    ->modalHeading(__('Delete Governorate'))
                    ->visible(function (Governorate $governorate): bool {
                        return auth()->user()->can('delete_governorate') &&
                            !$governorate->deleted_at;
                    })
                    ->deleteActionCommonConfiguration(),

                RestoreAction::make()
                    ->modalHeading(__('Restore Governorate'))
                    ->visible(function (Governorate $governorate): bool {
                        return auth()->user()->can('restore_governorate') &&
                            $governorate->deleted_at;
                    })
                    ->restoreActionCommonConfiguration(),

            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make('DeleteBulkAction')
                        ->modalHeading(__('Delete selected governorates'))
                        ->visible(fn(): bool => auth()->user()->can('delete_governorate')),
                ])
                    ->visible(fn(): bool => auth()->user()->canany(['delete_governorate'])),

            ])
            ->headerActions([
                CreateAction::make('create')
                    ->label(__('Create Governorate'))
                    ->url(route('dashboard.geolocation.governorates.create'))
                    ->visible(fn(): bool => auth()->user()->can('create_governorate'))
                    ->extraAttributes([
                        'class' => 'fi-ta-create-action-btn',
                    ])
                    ->button(),

            ])
            ->emptyStateDescription(__('Create a governorate to get started.'));
    }

    private function viewAction(): ViewAction
    {
        return ViewAction::make('view')
            ->visible(fn(): bool => auth()->user()->can('access_governorate_details'))
            ->modalHeading(__('Governorate'))
            ->modalWidth(MaxWidth::Large)
            ->infolist([
                TextEntry::make('country')
                    ->label(__('Country'))
                    ->inlineLabel()
                    ->state(function (Governorate $governorate): ?string {
                        return $governorate->country?->getCommonName();
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

        return view('geolocation::livewire.pages.governorates.index')
            ->layout(AppLayouts::class, [
                'pageTitle'   => __('Governorates'),
                'breadcrumbs' => [
                    route('dashboard.home')                     => __('Home'),
                    route('dashboard.geolocation.governorates') => __('Governorates'),
                ],
            ]);
    }
}
