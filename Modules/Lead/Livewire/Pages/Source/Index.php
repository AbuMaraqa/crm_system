<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/23/24, 9:35 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Lead\Livewire\Pages\Source;

use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
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
use Modules\Lead\Entities\Department;
use Modules\Lead\Entities\Source;
use Modules\Lead\Entities\Tag;

class Index extends Component implements HasForms, HasTable
{
    use InteractsWithForms;
    use InteractsWithTable;

    public function table($table)
    {
        return $table
            ->heading(__('Lead Sources'))
            ->query(
                Source::query()
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
                    ->state(function (Source $source) {
                        return array_keys($source->getTranslationsArray());
                    })
                    ->alignCenter()
                    ->sortable(query: function (Builder $query): Builder {
                        return $query->orderByTranslation('locale');
                    }),

                TextColumn::make('created_by')
                    ->label(__('Created By'))
                    ->state(function (Source $source) {
                        return $source->translateOrDefault()->user;
                    })
                    ->formatStateUsing(function (Source $source) {
                        return $source->translateOrDefault()->user->renderAsTableColumn();
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
                    ->visible(auth()->user()->can('dashboard.lead.tags.filters.trashed')),
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
                        ->modalHeading(__('Delete Selected Sources'))
                        ->visible(fn(): bool => auth()->user()->can('dashboard.lead.sources.bulk_delete')),
                ])
                    ->visible(fn(): bool => auth()->user()->canany(['dashboard.shop.sources.bulk_delete'])),

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
            ->label(__('Create Source'))
            ->modalHeading(__('Create Source'))
            ->modalWidth(MaxWidth::Small)
            ->form([
                TextInput::make('title')
                    ->label(__('Title'))
                    ->required(),
            ])
            ->successRedirectUrl(route('dashboard.lead.sources'))
            ->visible(fn(): bool => auth()->user()->can('dashboard.lead.sources.create'))
            ->extraAttributes([
                'class' => 'fi-ta-create-action-btn',
            ])
            ->button();
    }

    /**
     * @return mixed
     */
    public function editAction(): mixed
    {
        return EditAction::make()
            ->label(__('Create Source'))
            ->modalHeading(__('Edit Source'))
            ->modalWidth(MaxWidth::Small)
            ->form([
                TextInput::make('title')
                    ->label(__('Title'))
                    ->required(),
            ])
            ->successRedirectUrl(route('dashboard.lead.sources'))
            ->visible(fn(): bool => auth()->user()->can('dashboard.lead.sources.edit'))
            ->editActionCommonConfiguration();
    }

    public function viewAction()
    {
        return ViewAction::make('view')
            ->visible(fn(): bool => auth()->user()->can('dashboard.lead.sources.view'))
            ->modalHeading(__('View Source Details'))
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
                            ->columnSpan(6),
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
            ->modalHeading(__('Delete Source'))
            ->visible(function (Department $department): bool {
                return auth()->user()->can('dashboard.lead.sources.delete') && !$department->deleted_at;
            })
            ->deleteActionCommonConfiguration();
    }

    /**
     * @return mixed
     */
    public function restoreAction(): mixed
    {
        return RestoreAction::make()
            ->modalHeading(__('Restore Source'))
            ->visible(function (Source $source): bool {
                return auth()->user()->can('dashboard.lead.sources.restore') && $source->deleted_at;
            })
            ->restoreActionCommonConfiguration();
    }

    /**
     * @return View
     */
    public function render(): View
    {
        return view('lead::livewire.pages.source.index')
            ->layout(AppLayouts::class, [
                'pageTitle'   => __('Lead Sources'),
                'breadcrumbs' => [
                    route('dashboard.home')          => __('Home'),
                    route('dashboard.lead.sources') => __('Lead Sources'),
                ],
            ]);
    }
}
