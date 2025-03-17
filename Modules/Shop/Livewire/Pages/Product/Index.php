<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/23/24, 9:35 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Shop\Livewire\Pages\Product;

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
use Filament\Tables\Columns\ImageColumn;
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
use Modules\Core\Filament\Tables\Actions\ActivitiesAction;
use Modules\Core\Filament\Tables\Columns\EventAtColumn;
use Modules\Core\View\Components\AppLayouts;
use Modules\Shop\Entities\Tag;
use Modules\Shop\Enums\ProductStatus;
use Modules\Shop\Facades\ProductCategoryHelper;
use Modules\Shop\Facades\ProductHelper;

class Index extends Component implements HasForms, HasTable
{
    use InteractsWithForms;
    use InteractsWithTable;

    public function table($table)
    {
        return $table
            ->heading(__('Products'))
            ->query(
                Tag::with(['media', 'categories'])
            )
            ->columns([
                ImageColumn::make('main_image')
                    ->state(function (Tag $product) {
                        return $product->getMainImage();
                    })
                    ->label(__('Main Image'))
                    ->alignCenter()
                    ->width(60)
                    ->height(60)
                    ->square(),

                TextColumn::make('title')
                    ->label(__('Title'))
                    ->url(fn(Tag $product): string => route('dashboard.shop.products.edit', $product->id))
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
                    ->state(function (Tag $product) {
                        return array_keys($product->getTranslationsArray());
                    })
                    ->alignCenter()
                    ->sortable(query: function (Builder $query): Builder {
                        return $query->orderByTranslation('locale');
                    }),

                TextColumn::make('status')
                    ->label(__('Status'))
                    ->formatStateUsing(function (ProductStatus $state) {
                        return $state->renderAsBadge();
                    })
                    ->html()
                    ->alignCenter()
                    ->sortable(),

                TextColumn::make('categories')
                    ->label(__('Categories'))
                    ->state(function (Tag $product) {
                        return $product->categories->map(fn($category) => $category->title)->toArray();
                    })
                    ->badge()
                    ->color('info')
                    ->sortable(),


                TextColumn::make('is_featured')
                    ->label(__('Is Featured?'))
                    ->formatStateUsing(function (Tag $product): string {
                        return ProductHelper::renderProperty($product->is_featured);
                    })
                    ->html()
                    ->alignCenter()
                    ->sortable(),

                TextColumn::make('is_top')
                    ->label(__('Is Top?'))
                    ->formatStateUsing(function (Tag $product): string {
                        return ProductHelper::renderProperty($product->is_top);
                    })
                    ->html()
                    ->alignCenter()
                    ->sortable(),

                TextColumn::make('is_hot_deals')
                    ->label(__('Is Hot Deals?'))
                    ->formatStateUsing(function (Tag $product): string {
                        return ProductHelper::renderProperty($product->is_hot_deals);
                    })
                    ->html()
                    ->alignCenter()
                    ->sortable(),

                TextColumn::make('is_best_seller')
                    ->label(__('Is Best Seller?'))
                    ->formatStateUsing(function (Tag $product): string {
                        return ProductHelper::renderProperty($product->is_best_seller);
                    })
                    ->html()
                    ->alignCenter()
                    ->sortable(),

                TextColumn::make('created_by')
                    ->label(__('Created By'))
                    ->state(function (Tag $product) {
                        return $product->translateOrDefault()->user;
                    })
                    ->formatStateUsing(function (Tag $product) {
                        return $product->translateOrDefault()->user->renderAsTableColumn();
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

                SelectFilter::make('categories')
                    ->label(__('Categories'))
                    ->multiple()
                    ->searchable()
                    ->options(ProductCategoryHelper::getProductCategoriesOptions(true))
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['values'],
                                fn(Builder $query, $values): Builder => $query->whereHas('categories', fn(Builder $query) => $query->whereIn('product_category_id', $values)),
                            );
                    }),

                SelectFilter::make('status')
                    ->label(__('Status'))
                    ->multiple()
                    ->searchable()
                    ->options(ProductStatus::toArray()),

                TernaryFilter::make('is_featured')
                    ->label(__('Is Featured?')),

                TernaryFilter::make('is_top')
                    ->label(__('Is Top?')),

                TernaryFilter::make('is_hot_deals')
                    ->label(__('Is Hot Deals?')),

                TernaryFilter::make('is_best_seller')
                    ->label(__('Is Best Seller?')),

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
                    ->visible(auth()->user()->can('dashboard.shop.products.filters.trashed')),
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
                        ->modalHeading(__('Delete Selected Products'))
                        ->visible(fn(): bool => auth()->user()->can('dashboard.shop.products.bulk_delete')),
                ])
                    ->visible(fn(): bool => auth()->user()->canany(['dashboard.shop.products.bulk_delete'])),

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
            ->label(__('Create Tag'))
            ->url(route('dashboard.shop.products.create'))
            ->successRedirectUrl(route('dashboard.shop.products'))
            ->visible(fn(): bool => auth()->user()->can('dashboard.shop.products.create'))
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
            ->url(fn(Tag $product): string => route('dashboard.shop.products.edit', $product->id))
            ->successRedirectUrl(route('dashboard.shop.products'))
            ->visible(fn(): bool => auth()->user()->can('dashboard.shop.products.edit'))
            ->editActionCommonConfiguration();
    }

    public function viewAction()
    {
        return ViewAction::make('view')
            ->visible(fn(): bool => auth()->user()->can('dashboard.shop.products.view'))
            ->modalHeading(__('View Tag Details'))
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

//                        FileUpload::make('image')
//                            ->label(__('Image'))
//                            ->columnSpan(6),



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
            ->modalHeading(__('Delete Tag'))
            ->visible(function (Tag $product): bool {
                return auth()->user()->can('dashboard.shop.products.delete') && !$product->deleted_at;
            })
            ->deleteActionCommonConfiguration();
    }

    /**
     * @return mixed
     */
    public function restoreAction(): mixed
    {
        return RestoreAction::make()
            ->modalHeading(__('Restore Tag'))
            ->visible(function (Tag $product): bool {
                return auth()->user()->can('dashboard.shop.products.restore') && $product->deleted_at;
            })
            ->restoreActionCommonConfiguration();
    }

    /**
     * @return View
     */
    public function render(): View
    {
        return view('shop::livewire.pages.product.index')
            ->layout(AppLayouts::class, [
                'pageTitle'   => __('Tag Categories'),
                'breadcrumbs' => [
                    route('dashboard.home')          => __('Home'),
                    route('dashboard.shop.products') => __('Products'),
                ],
            ]);
    }
}
