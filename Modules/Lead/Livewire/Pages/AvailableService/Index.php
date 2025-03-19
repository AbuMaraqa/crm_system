<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/23/24, 9:35 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Lead\Livewire\Pages\AvailableService;

use App\Traits\DateTime;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
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
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Filters\TrashedFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\View\View;
use Livewire\Component;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Modules\Core\Entities\User;
use Modules\Core\Filament\Forms\Components\Flatpickr;
use Modules\Core\Filament\Forms\Components\Select;
use Modules\Core\Filament\Tables\Actions\ActivitiesAction;
use Modules\Core\Filament\Tables\Columns\EventAtColumn;
use Modules\Core\View\Components\AppLayouts;
use Modules\Lead\Entities\AvailableService;
use Modules\Lead\Entities\Department;
use Modules\Lead\Entities\Status;
use Modules\Lead\Entities\Tag;

class Index extends Component implements HasForms, HasTable
{
    use InteractsWithForms;
    use InteractsWithTable;

    public function table($table)
    {
        return $table
            ->heading(__('Lead Available Services'))
            ->query(
                AvailableService::with('availableServicePlans')
            )
            ->columns([
                TextColumn::make('title')
                    ->label(__('Title'))
                    ->icon('heroicon-s-pencil-square')
                    ->iconColor('info')
                    ->action($this->editAction())
                    ->searchable(query: function (Builder $query, string $search): Builder {
                        return $query
                            ->whereTranslationLike('title', "%{$search}%");
                    })
                    ->sortable(query: function (Builder $query): Builder {
                        return $query
                            ->orderByTranslation('title');
                    }),

                TextColumn::make('locale')
                    ->label(__('Available Languages'))
                    ->state(function (AvailableService $availableService) {
                        return array_keys($availableService->getTranslationsArray());
                    })
                    ->alignCenter()
                    ->sortable(query: function (Builder $query): Builder {
                        return $query->orderByTranslation('locale');
                    }),

                TextColumn::make('created_by')
                    ->label(__('Created By'))
                    ->state(function (AvailableService $availableService) {
                        return $availableService->translateOrDefault()->user;
                    })
                    ->formatStateUsing(function (AvailableService $availableService) {
                        return $availableService->translateOrDefault()->user->renderAsTableColumn();
                    })
                    ->html()
                    ->wrap(),


                EventAtColumn::make('created_at')
                    ->createdAt(),

                EventAtColumn::make('updated_at')
                    ->updatedAt(),

            ])
            ->filters([
                Filter::make('title')
                    ->label(__('Title'))
                    ->form([
                        TextInput::make('title')
                            ->label(__('Title')),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->whereTranslationLike('title', "%{$data['title']}%");
                    }),

                SelectFilter::make('locale')
                    ->label(__('Available Languages'))
                    ->multiple()
                    ->searchable()
                    ->options(array_map(fn($locale) => $locale['native'], LaravelLocalization::getSupportedLocales()))
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['values'],
                                fn(Builder $query, $values): Builder => $query->whereHas('translations', fn(Builder $query) => $query->whereIn('locale', $values)),
                            );
                    }),

                SelectFilter::make('created_by')
                    ->label(__('Created By'))
                    ->multiple()
                    ->searchable()
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['values'],
                                fn(Builder $query, $values): Builder => $query->whereHas('translations', fn(Builder $query) => $query->whereIn('created_by', $values)),
                            );
                    })
                    ->options(User::pluck('name', 'id')),

                Filter::make('created_at')
                    ->form([
                        Flatpickr::make('created_at')
                            ->label(__('Created At')),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_at'],
                                fn(Builder $query, $date): Builder => $query->whereDate('created_at', '=', $date),
                            );
                    }),

                Filter::make('updated_at')
                    ->form([
                        Flatpickr::make('updated_at')
                            ->label(__('Updated At')),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['updated_at'],
                                fn(Builder $query, $date): Builder => $query->whereDate('updated_at', '=', $date),
                            );
                    }),

                TrashedFilter::make()
                    ->visible(auth()->user()->can('dashboard.lead.available_services.filters.trashed')),
            ])
            ->deferFilters()
            ->filtersFormMaxHeight('500px')
            ->actions([
                ActivitiesAction::make('activities'),

                // $this->viewAction(),

                $this->editAction(),

                $this->deleteAction(),

                $this->restoreAction(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make('DeleteBulkAction')
                        ->modalHeading(__('Delete Selected Available Services'))
                        ->visible(fn(): bool => auth()->user()->can('dashboard.lead.available_services.bulk_delete')),
                ])
                    ->visible(fn(): bool => auth()->user()->canany(['dashboard.shop.available_services.bulk_delete'])),

            ])
            ->headerActions([
                $this->createAction(),
            ]);
    }


    /**
     * @return CreateAction
     */
    public function createAction(): CreateAction
    {
        return CreateAction::make('create')
            ->label(__('Create Available Service'))
            ->modalHeading(__('Create Available Service'))
            ->modalWidth(MaxWidth::Large)
            ->form([
                Grid::make()
                    ->columns([
                        'default' => 12,
                        'lg'      => 12,
                    ])
                    ->schema([
                        TextInput::make('title')
                            ->label(__('Title'))
                            ->columnSpan(4)
                            ->required(),
                            Repeater::make('availableServicesPlans')
                            ->label(__('Available Services Plans'))
                            ->columnSpan(12)
                            ->defaultItems(1)
                            ->schema([
                                Grid::make()
                                    ->columns([
                                        'default' => 12,
                                        'lg'      => 12,
                                    ])
                                    ->schema([
                                        TextInput::make('title')
                                            ->label(__('Title'))
                                            ->columnSpan(12)
                                            ->required(),
                                        TextInput::make('price')
                                            ->label(__('Price'))
                                            ->columnSpan(4)
                                            ->numeric()
                                            ->required(),
                                        DateTimePicker::make('start_date')
                                            ->label(__('Start Date'))
                                            ->columnSpan(4)
                                            ->required(),
                                        DateTimePicker::make('end_date')
                                            ->label(__('End Date'))
                                            ->columnSpan(4)
                                            ->required(),
                                        Textarea::make('description')
                                            ->label(__('Description'))
                                            ->columnSpan(12)
                                            ->required(),
                                    ])
                            ])
                    ])
            ])
            ->using(function (array $data) {
                $availableService = AvailableService::create($data);

                if (isset($data['availableServicesPlans']) && count($data['availableServicesPlans']) > 0) {
                    foreach ($data['availableServicesPlans'] as $availableServicesPlan) {
                        $availableServicesPlan['service_id'] = $availableService->id;
                        $availableService->availableServicePlans()->create($availableServicesPlan);
                    }
                }

                return $availableService;
            })
            ->successRedirectUrl(route('dashboard.lead.available_services'))
            ->visible(fn(): bool => auth()->user()->can('dashboard.lead.available_services.create'))
            ->extraAttributes([
                'class' => 'fi-ta-create-action-btn',
            ]);
    }

    /**
     * @return mixed
     */
    public function editAction(): mixed
{
    return EditAction::make()
        ->label(__('Edit Status'))
        ->modalHeading(__('Edit Status'))
        ->modalWidth(MaxWidth::Large)
        ->form([
            Grid::make()
                ->columns([
                    'default' => 12,
                    'lg'      => 12,
                ])
                ->schema([
                    TextInput::make('title')
                        ->label(__('Title'))
                        ->columnSpan(4)
                        ->required(),
                    Repeater::make('availableServicePlans')
                        ->label(__('Available Services Plans'))
                        ->columnSpan(12)
                        ->defaultItems(1)
                        ->relationship()
                        ->schema([
                            Grid::make()
                                ->columns([
                                    'default' => 12,
                                    'lg'      => 12,
                                ])
                                ->schema([
                                    TextInput::make('title')
                                        ->label(__('Title'))
                                        ->columnSpan(12)
                                        ->required(),
                                    TextInput::make('price')
                                        ->label(__('Price'))
                                        ->columnSpan(4)
                                        ->numeric()
                                        ->required(),
                                    DateTimePicker::make('start_date')
                                        ->label(__('Start Date'))
                                        ->columnSpan(4)
                                        ->required(),
                                    DateTimePicker::make('end_date')
                                        ->label(__('End Date'))
                                        ->columnSpan(4)
                                        ->required(),
                                    Textarea::make('description')
                                        ->label(__('Description'))
                                        ->columnSpan(12)
                                        ->required(),
                                ])
                        ])
                ])
        ])
        ->successRedirectUrl(route('dashboard.lead.available_services'))
        ->visible(fn(): bool => auth()->user()->can('dashboard.lead.available_services.edit'))
        ->editActionCommonConfiguration()
        ->using(function (AvailableService $record, array $data) {
            $record->update($data);

            if (isset($data['availableServicesPlans']) && count($data['availableServicesPlans']) > 0) {
                foreach ($data['availableServicesPlans'] as $availableServicesPlan) {
                    if (isset($availableServicesPlan['id'])) {

                        $availableService = $record->availableServicePlans()->find($availableServicesPlan['id']);
                        if ($availableService) {
                            $availableService->update($availableServicesPlan);
                        }
                    } else {
                        $record->availableServicePlans()->create($availableServicesPlan);
                    }
                }
            }

            return $record;
        });
}

    public function viewAction()
    {
        return ViewAction::make('view')
            ->visible(fn(): bool => auth()->user()->can('dashboard.lead.available_services.view'))
            ->modalHeading(__('View Available Service Details'))
            ->modalWidth(MaxWidth::TwoExtraLarge)
            ->form([
                Grid::make()
                    ->columns([
                        'default' => 12,
                        'lg'      => 12,
                    ])
                    ->schema([
                        TextInput::make('title')
                            ->label(__('Title'))
                            ->columnSpan(12),
                    ]),
            ])
            ->viewActionCommonConfiguration();
    }


    /**
     * @return mixed
     */
    public function deleteAction(): mixed
    {
        return DeleteAction::make()
            ->modalHeading(__('Delete Available Service'))
            ->visible(function (AvailableService $availableService): bool {
                return auth()->user()->can('dashboard.lead.available_services.delete') && !$availableService->deleted_at;
            })
            ->deleteActionCommonConfiguration();
    }

    /**
     * @return mixed
     */
    public function restoreAction(): mixed
    {
        return RestoreAction::make()
            ->modalHeading(__('Restore Available Service'))
            ->visible(function (AvailableService $availableService): bool {
                return auth()->user()->can('dashboard.lead.available_services.restore') && $availableService->deleted_at;
            })
            ->restoreActionCommonConfiguration();
    }

    /**
     * @return View
     */
    public function render(): View
    {
        return view('lead::livewire.pages.available-service.index')
            ->layout(AppLayouts::class, [
                'pageTitle'   => __('Lead Available Services'),
                'breadcrumbs' => [
                    route('dashboard.home')          => __('Home'),
                    route('dashboard.lead.available_services') => __('Lead Available Services'),
                ],
            ]);
    }
}
