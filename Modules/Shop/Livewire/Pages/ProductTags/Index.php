<?php

/*************************************************
 * Copyright (c) 2024.
 *
 * @Author : Shaker Awad <awadshaker74@gmail.com>
 * @Date   : 7/17/24, 7:00 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Shop\Livewire\Pages\ProductTags;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
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
use Filament\Tables\Filters\TrashedFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\View\View;
use Livewire\Attributes\Url;
use Livewire\Component;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Modules\Core\Custom\Query\QueryContainer;
use Modules\Core\Entities\User;
use Modules\Core\Filament\Forms\Components\Flatpickr;
use Modules\Core\Filament\Forms\Components\Select;
use Modules\Core\Filament\Tables\Actions\ActivitiesAction;
use Modules\Core\Filament\Tables\Columns\EventAtColumn;
use Modules\Core\View\Components\AppLayouts;
use Modules\Shop\Entities\ProductTag;
use Modules\Shop\Enums\ProductTagStatus;

class Index extends Component implements HasForms, HasTable
{
    use InteractsWithForms;
    use InteractsWithTable;

    /**
     * @var array<string, mixed> | null
     */
    #[Url]
    public ?array $tableFilters = null;

    #[Url]
    public ?string $tableGrouping = null;

    #[Url]
    public ?string $tableGroupingDirection = null;

    /**
     * @var ?string
     */
    #[Url]
    public $tableSearch = '';


    #[Url]
    public ?string $tableSortDirection = null;

    public function table($table)
    {
        return $table
            ->heading(__('Tag Tags'))
            ->query(
                ProductTag::query()
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
                    ->state(function (ProductTag $productTag) {
                        return array_keys($productTag->getTranslationsArray());
                    })
                    ->alignCenter()
                    ->sortable(query: function (Builder $query): Builder {
                        return $query->orderByTranslation('locale');
                    }),

                TextColumn::make('status')
                    ->label(__('Status'))
                    ->formatStateUsing(function (ProductTagStatus $state) {
                        return $state->renderAsBadge();
                    })
                    ->html()
                    ->alignCenter()
                    ->sortable(),

                TextColumn::make('created_by')
                    ->label(__('Created By'))
                    ->state(function (ProductTag $productTag) {
                        return $productTag->translateOrDefault()->user;
                    })
                    ->formatStateUsing(function (ProductTag $productTag) {
                        return $productTag->translateOrDefault()->user->renderAsTableColumn();
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

                SelectFilter::make('status')
                    ->label(__('Status'))
                    ->multiple()
                    ->searchable()
                    ->options(ProductTagStatus::toArray()),

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
                    ->visible(auth()->user()->can('dashboard.shop.product_tags.filters.trashed')),
            ])
            ->deferFilters()
            ->filtersFormMaxHeight('500px')
            ->actions([
                ActivitiesAction::make('activities'),

                $this->viewAction(),

                $this->editAction(),

                $this->deleteAction(),

                $this->restoreAction(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make('DeleteBulkAction')
                        ->modalHeading(__('Delete Selected Tag Tags'))
                        ->visible(fn(): bool => auth()->user()->can('dashboard.shop.product_tags.bulk_delete')),
                ])
                    ->visible(fn(): bool => auth()->user()->canany(['dashboard.shop.product_tags.bulk_delete'])),

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
            ->label(__('Create Tag Tag'))
            ->modalHeading(__('Create Tag Tag'))
            ->modalWidth(MaxWidth::Medium)
            ->visible(fn(): bool => auth()->user()->can('dashboard.shop.product_tags.create'))
            ->form([
                TextInput::make('title')
                    ->label(__('Title'))
                    ->required()
                    ->maxLength(255),

                Select::make('status')
                    ->label(__('Status'))
                    ->options(ProductTagStatus::toArray())
                    ->default(ProductTagStatus::Published)
                    ->searchable()
                    ->required(),
            ])
            ->using(function (array $data) {
                return QueryContainer::make()
                    ->wrap(function () use ($data) {
                        $currentLocale = LaravelLocalization::getCurrentLocale();

                        $data[$currentLocale]['created_by'] = auth()->id();

                        return ProductTag::create($data);
                    });
            })
            ->successNotification(
                Notification::make()
                    ->title(__('Saved Successfully.'))
                    ->body(__('The product tag has been saved successfully.'))
                    ->success()
            )
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
        return EditAction::make('edit')
            ->hiddenLabel()
            ->modalHeading(__('Edit Tag Tag'))
            ->modalWidth(MaxWidth::Medium)
            ->visible(fn(): bool => auth()->user()->can('dashboard.shop.product_tags.edit'))
            ->form([
                TextInput::make('title')
                    ->label(__('Title'))
                    ->required()
                    ->maxLength(255),

                Select::make('status')
                    ->label(__('Status'))
                    ->options(ProductTagStatus::toArray())
                    ->default(ProductTagStatus::Published)
                    ->searchable()
                    ->required(),
            ])
            ->using(function (ProductTag $productTag, array $data) {
                return QueryContainer::make()
                    ->wrap(function () use ($productTag, $data) {

                        $currentLocale                      = LaravelLocalization::getCurrentLocale();
                        $data[$currentLocale]['created_by'] = $productTag->translate($currentLocale)?->created_by ?? auth()->id();

                        return $productTag->update($data);
                    });
            })
            ->successNotification(
                Notification::make()
                    ->title(__('Saved Successfully.'))
                    ->body(__('The product tag has been saved successfully.'))
                    ->success()
            )
            ->editActionCommonConfiguration();
    }

    public function viewAction()
    {
        return ViewAction::make('view')
            ->visible(fn(): bool => auth()->user()->can('dashboard.shop.product_tags.view'))
            ->modalHeading(__('View Tag Tag'))
            ->modalWidth(MaxWidth::TwoExtraLarge)
            ->form([
                TextInput::make('title')
                    ->label(__('Title')),

                TextInput::make('status')
                    ->label(__('Status')),
            ])
            ->viewActionCommonConfiguration();
    }


    /**
     * @return mixed
     */
    public function deleteAction(): mixed
    {
        return DeleteAction::make()
            ->modalHeading(__('Delete Tag Tag'))
            ->visible(function (ProductTag $productTag): bool {
                return auth()->user()->can('dashboard.shop.product_tags.delete') && !$productTag->deleted_at;
            })
            ->deleteActionCommonConfiguration();
    }

    /**
     * @return mixed
     */
    public function restoreAction(): mixed
    {
        return RestoreAction::make()
            ->modalHeading(__('Restore Tag Tag'))
            ->visible(function (ProductTag $productTag): bool {
                return auth()->user()->can('dashboard.shop.product_tags.restore') && $productTag->deleted_at;
            })
            ->restoreActionCommonConfiguration();
    }

    /**
     * @return View
     */
    public function render(): View
    {
        return view('shop::livewire.pages.product-tags.index')
            ->layout(AppLayouts::class, [
                'pageTitle'   => __('Tag Tags'),
                'breadcrumbs' => [
                    route('dashboard.home')              => __('Home'),
                    route('dashboard.shop.product_tags') => __('Tag Tags'),
                ],
            ]);
    }
}
