<?php

/*************************************************
 * Copyright (c) 2024.
 *
 * @Author : Shaker Awad <awadshaker74@gmail.com>
 * @Date   : 7/17/24, 7:00 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Shop\Livewire\Pages\Pages;

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
use Modules\Shop\Entities\Page;
use Modules\Shop\Enums\PagesSlugStatus;
use Modules\Shop\Facades\BrandHelper;

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
            ->heading(__('Pages'))
            ->query(
                Page::with(['media'])
            )
            // ->reorderable('sort_order')
            ->columns([
                // ImageColumn::make('image')
                //     ->label(__('Image'))
                //     ->state(function (Page $page) {
                //         return $page->getImage();
                //     })
                //     ->alignCenter()
                //     ->width(60)
                //     ->height(60)
                //     ->square(),

                TextColumn::make('title')
                    ->label(__('Title'))
                    ->url(fn(Page $page): string => route('dashboard.shop.pages.edit', $page->id))
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
                    ->state(function (Page $brand) {
                        return array_keys($brand->getTranslationsArray());
                    })
                    ->alignCenter()
                    ->sortable(query: function (Builder $query): Builder {
                        return $query->orderByTranslation('locale');
                    }),

                TextColumn::make('slug')
                    ->label(__('Slug'))
                    ->formatStateUsing(function (PagesSlugStatus $state) {
                        return $state->renderAsBadge();
                    })
                    ->html()
                    ->alignCenter()
                    ->sortable(),


                TextColumn::make('created_by')
                    ->label(__('Created By'))
                    ->state(function (Page $brand) {
                        return $brand->translateOrDefault()->user;
                    })
                    ->formatStateUsing(function (Page $brand) {
                        return $brand->translateOrDefault()->user->renderAsTableColumn();
                    })
                    ->html()
                    ->wrap(),

                EventAtColumn::make('created_at')
                    ->createdAt(),

                EventAtColumn::make('updated_at')
                    ->updatedAt(),

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
                        ->modalHeading(__('Delete Selected Brands'))
                        ->visible(fn(): bool => auth()->user()->can('dashboard.shop.pages.bulk_delete')),
                ])
                    ->visible(fn(): bool => auth()->user()->canany(['dashboard.shop.pages.bulk_delete'])),

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
            ->label(__('Create Page'))
            ->url(route('dashboard.shop.pages.create'))
            ->successRedirectUrl(route('dashboard.shop.pages'))
            ->visible(fn(): bool => auth()->user()->can('dashboard.shop.pages.create'))
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
            // ->url(fn(Page $brand): string => route('dashboard.shop.pages.edit', $brand->id))
            ->successRedirectUrl(route('dashboard.shop.brands'))
            ->visible(fn(): bool => auth()->user()->can('dashboard.shop.pages.edit'))
            ->editActionCommonConfiguration();
    }

    public function viewAction()
    {
        return ViewAction::make('view')
            ->visible(fn(): bool => auth()->user()->can('dashboard.shop.pages.view'))
            ->modalHeading(__('View Brand'))
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

                        // Placeholder::make('image')
                        //     ->label(__('Image'))
                        //     ->content(function (Page $page): HtmlString {
                        //         return new HtmlString("<img class='w-100px' src= '" . $page->getFirstMediaUrl('pages') . "')>");
                        //     })
                        //     ->columnSpan(6),

                        TextInput::make('seo.meta_title')
                            ->label(__('Meta Title'))
                            ->columnSpan(6),

                        TextInput::make('seo.meta_description')
                            ->label(__('Meta Description'))
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
            ->modalHeading(__('Delete Page'))
            ->visible(function (Page $page): bool {
                return auth()->user()->can('dashboard.shop.pages.delete') && !$page->deleted_at;
            })
            ->deleteActionCommonConfiguration();
    }

    /**
     * @return mixed
     */
    public function restoreAction(): mixed
    {
        return RestoreAction::make()
            ->modalHeading(__('Restore Page'))
            ->visible(function (Page $brand): bool {
                return auth()->user()->can('dashboard.shop.pages.restore') && $brand->deleted_at;
            })
            ->restoreActionCommonConfiguration();
    }

    /**
     * @return View
     */
    public function render(): View
    {
        return view('shop::livewire.pages.page.index')
            ->layout(AppLayouts::class, [
                'pageTitle'   => __('Pages'),
                'breadcrumbs' => [
                    route('dashboard.home')        => __('Home'),
                    route('dashboard.shop.pages') => __('Pages'),
                ],
            ]);
    }
}
