<?php

/*************************************************
 * Copyright (c) 2024.
 *
 * @Author : Shaker Awad <awadshaker74@gmail.com>
 * @Date   : 7/17/24, 7:00 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Shop\Livewire\Pages\Banner;

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
use Modules\Shop\Entities\Banner;
use Modules\Shop\Entities\Brand;
use Modules\Shop\Enums\BannersStatus;
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
            ->query(
                Banner::query()
            )
            ->columns([
                ImageColumn::make('image')
                    ->state(function (Banner $banner) {
                        return $banner->getImage();
                    })
                    ->label(__('Brand Image'))
                    ->alignCenter()
                    ->width(60)
                    ->height(60)
                    ->square(),

                TextColumn::make('title')
                    ->label(__('Title'))
                    ->searchable()
                    ->sortable(),

                // TextColumn::make('description')
                //     ->label(__('Description'))
                //     ->searchable()
                //     ->sortable(),

                TextColumn::make('label_button')
                    ->label(__('Label Button'))
                    ->searchable()
                    ->sortable(),

                TextColumn::make('link')
                    ->label(__('Link'))
                    ->searchable()
                    ->sortable(),

                TextColumn::make('type')
                    ->label(__('Type'))
                    ->searchable()
                    ->sortable(),

                EventAtColumn::make('created_at')
                    ->label(__('Created At'))
                    ->searchable()
                    ->sortable(),

                EventAtColumn::make('updated_at')
                    ->label(__('Updated At'))
                    ->searchable()
                    ->sortable(),
            ])
            ->actions([
                $this->viewAction(),
                $this->editAction(),
                $this->deleteAction(),
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
            ->label(__('Create Banner'))
            ->url(route('dashboard.shop.banners.create'))
            ->successRedirectUrl(route('dashboard.shop.banners'))
            ->visible(fn(): bool => auth()->user()->can('dashboard.shop.banners.create'))
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
            ->url(fn(Banner $banner): string => route('dashboard.shop.banners.edit', $banner->id))
            ->successRedirectUrl(route('dashboard.shop.banners'))
            ->visible(fn(): bool => auth()->user()->can('dashboard.shop.banners.edit'))
            ->editActionCommonConfiguration();
    }

    public function viewAction()
    {
        return ViewAction::make('view')
            ->visible(fn(): bool => auth()->user()->can('dashboard.shop.banners.view'))
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
                            ->content(function (Banner $banner): HtmlString {
                                return new HtmlString("<img class='w-100px' src= '" . $banner->getFirstMediaUrl('banners') . "')>");
                            })
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
            ->modalHeading(__('Delete Brand'))
            ->visible(function (Banner $banner): bool {
                return auth()->user()->can('dashboard.shop.banners.delete') && !$banner->deleted_at;
            })
            ->deleteActionCommonConfiguration();
    }

    /**
     * @return mixed
     */
    public function restoreAction(): mixed
    {
        return RestoreAction::make()
            ->modalHeading(__('Restore Brand'))
            ->visible(function (Banner $banner): bool {
                return auth()->user()->can('dashboard.shop.banners.restore') && $banner->deleted_at;
            })
            ->restoreActionCommonConfiguration();
    }

    /**
     * @return View
     */
    public function render(): View
    {
        return view('shop::livewire.pages.banners.index')
            ->layout(AppLayouts::class, [
                'pageTitle'   => __('Brands'),
                'breadcrumbs' => [
                    route('dashboard.home')        => __('Home'),
                    route('dashboard.shop.banners') => __('Brands'),
                ],
            ]);
    }
}
