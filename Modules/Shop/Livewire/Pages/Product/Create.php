<?php

/*************************************************
 * Copyright (c) 2024.
 *
 * @Author : Shaker Awad <awadshaker74@gmail.com>
 * @Date   : 6/23/24, 9:35 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Shop\Livewire\Pages\Product;

use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Notifications\Notification;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Modules\Core\Custom\Query\QueryContainer;
use Modules\Core\Filament\Forms\Components\Alert;
use Modules\Core\Filament\Forms\Components\Select;
use Modules\Core\Filament\Forms\Components\TreeCheckboxListField;
use Modules\Core\Services\Sluggable\Slug;
use Modules\Core\Traits\HasFormControlButtons;
use Modules\Core\View\Components\AppLayouts;
use Modules\Shop\Entities\Tag;
use Modules\Shop\Entities\ProductCategory;
use Modules\Shop\Entities\ProductTag;
use Modules\Shop\Entities\ProductTagTranslation;
use Modules\Shop\Enums\ProductStatus;
use Modules\Shop\Facades\ProductCategoryHelper;
use Modules\Shop\Facades\ProductLabelHelper;

class Create extends Component implements HasForms
{
    use HasFormControlButtons;
    use InteractsWithForms;

    public ?array $data = [];

    /**
     * @return void
     */
    public function mount(): void
    {
        $this->fillForm();
    }

    /**
     * @return void
     */
    private function fillForm(): void
    {
        $this->form->fill();
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
                                            ->afterStateUpdated(function (Get $get, Set $set, ?string $old, ?string $state) {
                                                if (($get('slug') ?? '') !== Str::slug($old)) {
                                                    return;
                                                }

                                                $set('slug', Slug::make($state));
                                            })
                                            ->columnSpan([
                                                'default' => 12,
                                                'md'      => 6,
                                            ])
                                            ->required()
                                            ->live(onBlur: true)
                                            ->maxLength(255),

                                        TextInput::make('slug')
                                            ->label(__('Slug'))
                                            ->columnSpan([
                                                'default' => 12,
                                                'md'      => 6,
                                            ])
                                            ->required()
                                            ->unique(Tag::class, 'slug', ignoreRecord: true)
                                            ->maxLength(255),

                                        Textarea::make('description')
                                            ->label(__('Short Description'))
                                            ->columnSpan([
                                                'default' => 12,
                                                'md'      => 12,
                                            ])
                                            ->rows(5)
                                            ->nullable(),

                                        RichEditor::make('content')
                                            ->label(__('Content'))
                                            ->columnSpan([
                                                'default' => 12,
                                                'md'      => 12,
                                            ])
                                            ->nullable(),

                                    ]),

                                Section::make()
                                    ->heading(__('Tag Details'))
                                    ->schema([
                                        Tabs::make()
                                            ->tabs([
                                                Tabs\Tab::make(__('Media'))
                                                    ->icon('iconsax-bul-gallery')
                                                    ->schema([
                                                        FileUpload::make('main_image')
                                                            ->label(__('Main Image'))
                                                            ->image()
                                                            ->nullable()
                                                            ->imageEditor()
                                                            ->storeFiles(false)
                                                            ->acceptedFileTypes(['image/png', 'image/jpeg', 'image/jpg']),

                                                        FileUpload::make('gallery')
                                                            ->label(__('Gallery'))
                                                            ->image()
                                                            ->multiple()
                                                            ->openable()
                                                            ->reorderable()
                                                            ->openable()
                                                            ->downloadable()
                                                            ->nullable()
                                                            ->imageEditor()
                                                            //                                                            ->imagePreviewHeight('180px')
                                                            //                                                            ->columns(8)
                                                            ->panelLayout('grid')
                                                            ->storeFiles(false)
                                                            ->acceptedFileTypes(['image/png', 'image/jpeg', 'image/jpg']),
                                                    ]),
                                                Tabs\Tab::make(__('Pricing'))
                                                    ->icon('iconsax-bul-dollar-square')
                                                    ->columns([
                                                        'default' => 12,
                                                        'md'      => 2,
                                                    ])
                                                    ->schema([
                                                        TextInput::make('price')
                                                            ->label(__('Price'))
                                                            ->prefix('$')
                                                            ->default(0)
                                                            ->required()
                                                            ->numeric(),

                                                        TextInput::make('sale_price')
                                                            ->label(__('Sale Price'))
                                                            ->prefix('$')
                                                            ->nullable()
                                                            ->numeric(),

                                                        TextInput::make('sku')
                                                            ->label(__('SKU'))
                                                            // ->unique(Tag::class , 'sku')
                                                            ->nullable(),

                                                        TextInput::make('quantity')
                                                            ->label(__('Quantity'))
                                                            ->nullable()
                                                            ->numeric(),
                                                    ]),
                                                Tabs\Tab::make(__('Shipping Information'))
                                                    ->icon('iconsax-bul-truck-tick')
                                                    ->columns([
                                                        'default' => 12,
                                                        'md'      => 2,
                                                    ])
                                                    ->schema([
                                                        TextInput::make('weight')
                                                            ->label(__('Weight'))
                                                            ->helperText(__('Weight in kg.'))
                                                            ->nullable()
                                                            ->numeric(),

                                                        TextInput::make('width')
                                                            ->label(__('Width'))
                                                            ->helperText(__('Width in cm.'))
                                                            ->nullable()
                                                            ->numeric(),

                                                        TextInput::make('height')
                                                            ->label(__('Height'))
                                                            ->helperText(__('Height in cm.'))
                                                            ->nullable()
                                                            ->numeric(),

                                                        TextInput::make('length')
                                                            ->label(__('Length'))
                                                            ->helperText(__('Length in cm.'))
                                                            ->nullable()
                                                            ->numeric(),
                                                    ]),
                                            ])
                                            ->activeTab(1),
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
                                            ->type('warning')
                                            ->message(trans("You are now editing the :locale version", ['locale' => LaravelLocalization::getCurrentLocaleNative()])),
                                    ]),

                                Section::make()
                                    ->heading(__('Status'))
                                    ->schema([
                                        Select::make('status')
                                            ->label(__('Status'))
                                            ->options(ProductStatus::toArray())
                                            ->default(ProductStatus::Published)
                                            ->searchable()
                                            ->required(),

                                    ]),

                                Section::make()
                                    ->heading(__('Labels'))
                                    ->schema([
                                        CheckboxList::make('labels')
                                            ->label(__('Labels'))
                                            ->options(ProductLabelHelper::getLabelsAsOptions())
                                            ->searchable()
                                            ->allowHtml()
                                            ->bulkToggleable()
                                            ->columns()
                                            // ->required(),
                                    ]),

                                Section::make()
                                    ->heading(__('Tag Tags'))
                                    ->schema([
                                        TagsInput::make('tags')
                                            // ->separator(',')
                                            ->reorderable()
                                            ->suggestions(
                                                (ProductTagTranslation::all()->pluck('title')->toArray()),
                                            )
                                    ]),

                                Section::make('')
                                    ->heading(__('Tag Category'))
                                    ->schema([
                                        TreeCheckboxListField::make('categories')
                                            ->label(__('Categories'))
                                            //                                            ->options(ProductCategoryHelper::getProductCategoriesOptions(true))
                                            ->options(ProductCategoryHelper::getProductCategoriesTree())
                                            ->bulkToggleable()
                                            ->searchable()
                                            ->required(),
                                    ]),

                                //                                Section::make()
                                //                                    ->heading(__('Brand'))
                                //                                    ->schema([
                                //                                        Select::make('brand_id')
                                //                                            ->label(__('Brand'))
                                //                                            ->options([])
                                //                                            ->searchable()
                                //                                            ->nullable(),
                                //                                    ]),

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

                                        Textarea::make('seo.meta_description')
                                            ->label(__('Meta Description'))
                                            ->nullable()
                                            ->maxLength(255),

                                        TextInput::make('seo.meta_keywords')
                                            ->label(__('Meta Keywords'))
                                            ->nullable()
                                            ->maxLength(255),

                                        FileUpload::make('seo.meta_image')
                                            ->label(__('Meta Image'))
                                            ->image()
                                            ->nullable()
                                            ->imageEditor()
                                            ->storeFiles(false)
                                            ->acceptedFileTypes(['image/png', 'image/jpeg', 'image/jpg']),
                                    ]),
                            ]),
                    ]),
            ])
            ->statePath('data');
    }


    /**
     * @return void
     * @throws AuthorizationException
     * @throws ValidationException
     */
    public function saving(): void
    {
        $this->authorize('dashboard.shop.product_categories.create');

        $this->validate();

        QueryContainer::make()
            ->wrap(function () {
                $currentLocale = LaravelLocalization::getCurrentLocale();

                $formattedData = $data = $this->form->getState();

                $formattedData[$currentLocale]['created_by'] = auth()->id();
                $formattedData['seo']                        = [
                    'meta_title'       => $data['seo']['meta_title'] ?? $data['title'],
                    'meta_description' => $data['seo']['meta_description'] ?? $data['description'],
                    'meta_keywords'    => $data['seo']['meta_keywords'] ?? '',
                ];

                $product = Tag::create($formattedData);

                if (isset($data['main_image']) && $data['main_image'] instanceof TemporaryUploadedFile) {
                    $product->addMedia($data['main_image']->getRealPath())->toMediaCollection('product_main_image');
                }

                if (isset($data['seo']['meta_image']) && $data['seo']['meta_image'] instanceof TemporaryUploadedFile) {
                    $product->addMedia($data['seo']['meta_image']->getRealPath())->toMediaCollection('meta_images');
                }

                foreach ($data['gallery'] as $image) {
                    if ($image instanceof TemporaryUploadedFile) {
                        $product->addMedia($image->getRealPath())->toMediaCollection('product_gallery');
                    }
                }

                $product->logSync('categories', $data['categories'], logColumns: ['title']);

//                $product->categories()->attach($data['categories']);

                if (isset($data['categories']) && count($data['categories']) > 0) {
                    foreach ($data['categories'] as $categoryId) {
                        $product->categories()->firstOrCreate([
                            'product_category_id' => $categoryId,
                        ]);
                    }
                }

                if (isset($data['labels'])) {
                    foreach ($data['labels'] as $labelId) {
                        $product->labels()->firstOrCreate([
                            'id' => $labelId,
                        ]);
                    }
                }

                if (isset($data['tags']) && is_array($data['tags'])) {
                    foreach ($data['tags'] as $tagTitle) {
                        $getTagId = ProductTag::whereTranslation('title',$tagTitle)->first()->id;
                        $product->tags()->firstOrCreate([
                            'id' => $getTagId,
                        ]);
                    }
                }

                Notification::make()
                    ->title(__('Saved Successfully.'))
                    ->body(__('The product has been saved successfully.'))
                    ->success()
                    ->send();

                $this->fillForm();
            });
    }

    /**
     * @return void
     */
    protected function redirectToIntendedRoute(): void
    {
        $this->redirectRoute('dashboard.shop.products');
    }

    /**
     * @return mixed
     */
    public function render(): mixed
    {
        return view('shop::livewire.pages.product.create')
            ->layout(AppLayouts::class, [
                'pageTitle'   => __('Create Tag'),
                'breadcrumbs' => [
                    route('dashboard.home')                 => __('Home'),
                    route('dashboard.shop.products')        => __('Products'),
                    route('dashboard.shop.products.create') => __('Create Tag'),
                ],
            ]);
    }
}
