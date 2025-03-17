<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/23/24, 9:35 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Shop\Livewire\Pages\ProductAttributeSets;

use Filament\Forms\Components\Grid;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Modules\Core\Custom\Query\QueryContainer;
use Modules\Core\Filament\Forms\Components\Alert;
use Modules\Core\Filament\Forms\Components\Select;
use Modules\Core\Filament\Forms\Components\Translations;
use Modules\Core\Traits\HasFormControlButtons;
use Modules\Core\View\Components\AppLayouts;
use Modules\Shop\Entities\ProductCategory;
use Modules\Shop\Enums\ProductCategoryStatus;
use Modules\Shop\Facades\ProductCategoryHelper;

class Edit extends Component implements HasForms
{
    use HasFormControlButtons;
    use InteractsWithForms;


    public ?array $data = [];

    #[Locked]
    public int $productCategoryID;

    /**
     * @param $productCategory
     *
     * @return void
     */
    public function mount($productCategory): void
    {
        $this->productCategoryID = $productCategory;
        $this->fillForm();
    }

    /**
     * @return Builder|Builder[]|Collection|Model|null
     */
    #[Computed()]
    public function productCategory(): Model|Collection|Builder|array|null
    {
        return ProductCategory::findOrFail($this->productCategoryID);
    }

    /**
     * @return void
     */
    private function fillForm(): void
    {
        $data = $this->productCategory->toArray();

        $this->form->fill($data);
    }

    /**
     * @param Form $form
     *
     * @return Form
     */
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make()
                    ->columns([
                        'default' => 12,
                        'lg'      => 12,
                    ])
                    ->schema([
                        Grid::make()
                            ->columnSpan([
                                'default' => 12,
                                'md'      => 8,
                            ])
                            ->schema([
                                Section::make()
                                    ->heading(__("Basic Information"))
                                    ->columns([
                                        'default' => 12,
                                        'md'      => 12,
                                    ])
                                    ->schema([
                                        TextInput::make('title')
                                            ->label(__('Title'))
                                            ->required()
                                            ->columnSpan([
                                                'default' => 12,
                                                'md'      => 6,
                                            ])
                                            ->maxLength(255),

                                        TextInput::make('slug')
                                            ->label(__('Slug'))
                                            ->columnSpan([
                                                'default' => 12,
                                                'md'      => 6,
                                            ])
                                            ->required()
                                            ->unique(ProductCategory::class, 'slug', $this->productCategory)
                                            ->maxLength(255),


                                        RichEditor::make('description')
                                            ->label(__('Description'))
                                            ->columnSpan([
                                                'default' => 12,
                                                'md'      => 12,
                                            ])
                                            ->nullable(),

                                    ]),
                            ]),

                        Grid::make()
                            ->columnSpan([
                                'default' => 12,
                                'md'      => 4,
                            ])
                            ->schema([
                                Section::make()
                                    ->heading(__('Translations'))
                                    ->schema([
                                        Alert::make('locale_alert')
                                            ->type('success')
                                            ->message(trans("You are now editing the :locale version", ['locale' => LaravelLocalization::getCurrentLocaleNative()])),

                                        Translations::make('translations')
                                            ->availableLocales(array_keys($this->productCategory->getTranslationsArray())),
                                    ]),

                                Section::make()
                                    ->heading(__('Status'))
                                    ->schema([
                                        Select::make('status')
                                            ->label(__('Status'))
                                            ->options(ProductCategoryStatus::toArray())
                                            ->default(ProductCategoryStatus::Published)
                                            ->searchable()
                                            ->required(),

                                    ]),

                                Section::make()
                                    ->heading(__('Properties'))
                                    ->schema([
                                        Toggle::make('is_featured')
                                            ->label(__('Is Featured?'))
                                            ->default(false)
                                            ->required(),

                                    ]),

                                Section::make()
                                    ->heading(__('Main Image'))
                                    ->schema([
                                        SpatieMediaLibraryFileUpload::make('image')
                                            ->label(__('Image'))
                                            ->collection('product_categories')
                                            ->model($this->productCategory)
                                            ->image()
                                            ->nullable()
                                            ->imageEditor()
                                            ->downloadable()
                                            ->openable()
                                            ->acceptedFileTypes(['image/png', 'image/jpeg', 'image/jpg']),
                                    ]),

                                Section::make()
                                    ->heading(__('Parent Category'))
                                    ->schema([
                                        Select::make('parent_id')
                                            ->label(__('Parent Category'))
                                            ->options(ProductCategoryHelper::getProductCategoriesOptions())
                                            ->searchable()
                                            ->default(0)
                                            ->required(),
                                    ]),

                            ]),

                        Grid::make()
                            ->columnSpan([
                                'default' => 12,
                                'lg'      => 12,
                            ])
                            ->schema([
                                Section::make()
                                    ->heading(__('Search Engine Optimization (SEO)'))
                                    ->description(__('Setup meta title & description to make your site easy to discovered on search engines such as Google.'))
                                    ->schema([
                                        TextInput::make('seo.meta_title')
                                            ->label(__('Meta Title'))
                                            ->nullable()
                                            ->maxLength(255),

                                        TextInput::make('seo.meta_description')
                                            ->label(__('Meta Description'))
                                            ->nullable()
                                            ->maxLength(255),

                                        TextInput::make('seo.meta_keywords')
                                            ->label(__('Meta Keywords'))
                                            ->nullable()
                                            ->maxLength(255),

                                        SpatieMediaLibraryFileUpload::make('seo.meta_image')
                                            ->label(__('Meta Image'))
                                            ->collection('meta_images')
                                            ->model($this->productCategory)
                                            ->image()
                                            ->nullable()
                                            ->imageEditor()
                                            ->acceptedFileTypes(['image/png', 'image/jpeg', 'image/jpg']),
                                    ]),
                            ]),
                    ]),
            ])
            ->statePath('data');
    }


    protected function redirectToIntendedRoute(): void
    {
        $this->redirectRoute('dashboard.shop.product_categories.edit', $this->productCategory->id);
    }


    /**
     * @return void
     * @throws AuthorizationException
     * @throws ValidationException
     */
    public function saving(): void
    {
        $this->authorize('dashboard.shop.product_categories.edit');

        $this->validate();

        QueryContainer::make()
            ->wrap(function () {
                $currentLocale = LaravelLocalization::getCurrentLocale();
                $data          = $this->form->getState();

                $productCategory = $this->productCategory;

                $data[$currentLocale]['created_by'] = $productCategory->translate($currentLocale)?->created_by ?? auth()->id();

                $productCategory->update($data);

                Notification::make()
                    ->title(__('Saved Successfully.'))
                    ->body(__('The product category has been saved successfully.'))
                    ->success()
                    ->send();

                $this->fillForm();
            });
    }

    /**
     * @return mixed
     */
    public function render(): mixed
    {
        return view('shop::livewire.pages.product-category.edit')
            ->layout(AppLayouts::class, [
                'pageTitle'   => __('Edit Tag Category'),
                'breadcrumbs' => [
                    route('dashboard.home')                                                   => __('Home'),
                    route('dashboard.shop.product_categories')                                => __('Tag Categories'),
                    $this->productCategory->getTitle(),
                    route('dashboard.shop.product_categories.edit', $this->productCategoryID) => __('Edit'),
                ],

            ]);
    }
}
