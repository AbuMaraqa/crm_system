<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/23/24, 9:35 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Shop\Livewire\Pages\ProductCategory;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Placeholder;
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
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Filters\TrashedFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\HtmlString;
use Illuminate\View\View;
use Livewire\Attributes\Url;
use Livewire\Component;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Modules\Core\Entities\User;
use Modules\Core\Filament\Forms\Components\Flatpickr;
use Modules\Core\Filament\Tables\Actions\ActivitiesAction;
use Modules\Core\Filament\Tables\Columns\EventAtColumn;
use Modules\Core\View\Components\AppLayouts;
use Modules\Shop\Entities\ProductCategory;
use Modules\Shop\Enums\ProductCategoryStatus;
use Modules\Shop\Facades\ProductCategoryHelper;

class Index extends Component implements HasForms, HasTable
{
    use InteractsWithForms;
    use InteractsWithTable;

    #[Url]
    public bool $isTableReordering = false;

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
    public ?string $tableSortColumn = null;

    #[Url]
    public ?string $tableSortDirection = null;

    public function table($table)
    {
        return $table
            ->heading(__('Tag Categories'))
            ->query(
                ProductCategory::with(['media', 'parent'])
            )
            ->reorderable('sort_order')
            ->columns([
                ImageColumn::make('image')
                    ->label(__('Image'))
                    ->state(function (ProductCategory $productCategory) {
                        return $productCategory->getImage();
                    })
                    ->alignCenter()
                    ->width(60)
                    ->height(60)
                    ->square(),

                TextColumn::make('title')
                    ->label(__('Title'))
                    ->url(fn(ProductCategory $productCategory): string => route('dashboard.shop.product_categories.edit', $productCategory->id))
                    ->icon('heroicon-s-pencil-square')
                    ->iconColor('info')
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
                    ->state(function (ProductCategory $productCategory) {
                        return array_keys($productCategory->getTranslationsArray());
                    })
                    ->alignCenter()
                    ->sortable(query: function (Builder $query): Builder {
                        return $query->orderByTranslation('locale');
                    }),

                TextColumn::make('parent_id')
                    ->label(__('Parent Category'))
                    ->state(function (ProductCategory $productCategory) {
                        if ($productCategory->parent_id == 0) {
                            return __('Root Category');
                        }
                        return $productCategory->parent->getTitle();
                    })
                    ->sortable(),

                TextColumn::make('status')
                    ->label(__('Status'))
                    ->formatStateUsing(function (ProductCategoryStatus $state) {
                        return $state->renderAsBadge();
                    })
                    ->html()
                    ->alignCenter()
                    ->sortable(),

                TextColumn::make('is_featured')
                    ->label(__('Is Featured?'))
                    ->formatStateUsing(function (ProductCategory $productCategory): string {
                        return ProductCategoryHelper::renderIsFeatured($productCategory);
                    })
                    ->html()
                    ->alignCenter()
                    ->sortable(),


                TextColumn::make('created_by')
                    ->label(__('Created By'))
                    ->state(function (ProductCategory $productCategory) {
                        return $productCategory->translateOrDefault()->user;
                    })
                    ->formatStateUsing(function (ProductCategory $productCategory) {
                        return $productCategory->translateOrDefault()->user->renderAsTableColumn();
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
                    ->options(ProductCategoryStatus::toArray()),

                TernaryFilter::make('is_featured')
                    ->label(__('Is Featured?')),

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
                    ->visible(auth()->user()->can('dashboard.shop.product_categories.filters.trashed')),
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
                        ->modalHeading(__('Delete Selected Products Categories'))
                        ->visible(fn(): bool => auth()->user()->can('dashboard.shop.product_categories.bulk_delete')),
                ])
                    ->visible(fn(): bool => auth()->user()->canany(['dashboard.shop.product_categories.bulk_delete'])),

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
            ->label(__('Create Tag Category'))
            ->url(route('dashboard.shop.product_categories.create'))
            ->successRedirectUrl(route('dashboard.shop.product_categories'))
            ->visible(fn(): bool => auth()->user()->can('dashboard.shop.product_categories.create'))
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
            ->url(fn(ProductCategory $productCategory): string => route('dashboard.shop.product_categories.edit', $productCategory->id))
            ->successRedirectUrl(route('dashboard.shop.product_categories'))
            ->visible(fn(): bool => auth()->user()->can('dashboard.shop.product_categories.edit'))
            ->editActionCommonConfiguration();
    }

    public function viewAction()
    {
        return ViewAction::make('view')
            ->visible(fn(): bool => auth()->user()->can('dashboard.shop.product_categories.view'))
            ->modalHeading(__('View Tag Category'))
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

                        TextInput::make('slug')
                            ->label(__('Slug'))
                            ->columnSpan(6),

                        TextInput::make('description')
                            ->label(__('Description'))
                            ->columnSpanFull(),

                        TextInput::make('status')
                            ->label(__('Status'))
                            ->columnSpan(6),


                        Toggle::make('is_featured')
                            ->label(__('Is Featured?'))
                            ->default(false)
                            ->columnSpan(6)
                            ->required(),

                        Placeholder::make('image')
                            ->label(__('Image'))
                            ->content(function (ProductCategory $productCategory): HtmlString {
                                return new HtmlString("<img class='w-100px' src= '" . $productCategory->getFirstMediaUrl('product_categories') . "')>");
                            })
                            ->columnSpan(6),

                        TextInput::make('parent_id')
                            ->label(__('Parent Category'))
                            ->columnSpan(6),

                        TextInput::make('seo.meta_title')
                            ->label(__('Meta Title'))
                            ->columnSpan(6),

                        TextInput::make('seo.meta_description')
                            ->label(__('Meta Description'))
                            ->columnSpan(6),

                        TextInput::make('seo.meta_keywords')
                            ->label(__('Meta Keywords'))
                            ->columnSpan(6),

                        FileUpload::make('seo.meta_image')
                            ->label(__('Meta Image'))
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
            ->modalHeading(__('Delete Tag Category'))
            ->visible(function (ProductCategory $productCategory): bool {
                return auth()->user()->can('dashboard.shop.product_categories.delete') && !$productCategory->deleted_at;
            })
            ->deleteActionCommonConfiguration();
    }

    /**
     * @return mixed
     */
    public function restoreAction(): mixed
    {
        return RestoreAction::make()
            ->modalHeading(__('Restore Tag Category'))
            ->visible(function (ProductCategory $productCategory): bool {
                return auth()->user()->can('dashboard.shop.product_categories.restore') && $productCategory->deleted_at;
            })
            ->restoreActionCommonConfiguration();
    }

    /**
     * @return View
     */
    public function render(): View
    {
        return view('shop::livewire.pages.product-category.index')
            ->layout(AppLayouts::class, [
                'pageTitle'   => __('Tag Categories'),
                'breadcrumbs' => [
                    route('dashboard.home')                    => __('Home'),
                    route('dashboard.shop.product_categories') => __('Tag Categories'),
                ],
            ]);
    }
}
