<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/23/24, 9:35 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Lead\Livewire\Pages\Lead;

use CodeWithDennis\FilamentSelectTree\SelectTree;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Textarea;
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
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Modules\Core\Custom\Query\QueryContainer;
use Modules\Core\Filament\Forms\Components\Alert;
use Modules\Core\Filament\Forms\Components\Select;
use Modules\Core\Filament\Forms\Components\Translations;
use Modules\Core\Filament\Forms\Components\TreeCheckboxListField;
use Modules\Core\Traits\HasFormControlButtons;
use Modules\Core\View\Components\AppLayouts;
use Modules\Shop\Entities\Tag;
use Modules\Shop\Enums\ProductStatus;
use Modules\Shop\Facades\ProductCategoryHelper;
use Modules\Shop\Facades\ProductLabelHelper;
use Filament\Forms\Components\TagsInput;
use Modules\Shop\Entities\ProductLabel;
use Modules\Shop\Entities\ProductTag;
use Modules\Shop\Entities\ProductTagTranslation;
use Modules\Shop\Enums\ProductTagStatus;
use Modules\Shop\Livewire\Pages\Product\Get;
use Modules\Shop\Livewire\Pages\Product\Set;
use Modules\Shop\Livewire\Pages\Product\Str;

class Edit extends Component implements HasForms
{
    use HasFormControlButtons;
    use InteractsWithForms;


    public ?array $data = [];

    #[Locked]
    public int $productID;

    /**
     * @param $product
     *
     * @return void
     */
    public function mount($product): void
    {
        $this->productID = $product;
        $this->fillForm();
    }

    /**
     * @return Builder|Builder[]|Collection|Model|null
     */
    #[Computed()]
    public function product(): Model|Collection|Builder|array|null
    {
        return Tag::with(['categories'])->findOrFail($this->productID);
    }

    /**
     * @return void
     */
    private function fillForm(): void
    {
        $data               = $this->product->toArray();
        $data['categories'] = $this->product->categories->pluck('id')->toArray();
        $data['tags'] = $this->product->tags->pluck('title')->toArray();
        $data['labels'] = $this->product->labels->pluck('id')->toArray();
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
                                            ->unique(
                                                Tag::class , 'slug', ignorable: $this->product
                                            )
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
                                                        SpatieMediaLibraryFileUpload::make('main_image')
                                                            ->label(__('Image'))
                                                            ->collection('product_main_image')
                                                            ->model($this->product)
                                                            ->image()
                                                            ->nullable()
                                                            ->imageEditor()
                                                            ->downloadable()
                                                            ->openable()
                                                            ->acceptedFileTypes(['image/png', 'image/jpeg', 'image/jpg']),

                                                        // FileUpload::make('gallery')
                                                        //     ->label(__('Gallery'))
                                                        //     ->image()
                                                        //     ->multiple()
                                                        //     ->openable()
                                                        //     ->reorderable()
                                                        //     ->openable()
                                                        //     ->downloadable()
                                                        //     ->nullable()
                                                        //     ->imageEditor()
                                                        //     //                                                            ->imagePreviewHeight('180px')
                                                        //     //                                                            ->columns(8)
                                                        //     ->panelLayout('grid')
                                                        //     ->storeFiles(false)
                                                        //     ->acceptedFileTypes(['image/png', 'iTmage/jpeg', 'image/jpg']),

                                                        SpatieMediaLibraryFileUpload::make('gallery')
                                                            ->label(__('Gallery'))
                                                            ->collection('product_gallery')
                                                            ->model($this->product)
                                                            ->image()
                                                            ->multiple()
                                                            ->nullable()
                                                            ->imageEditor()
                                                            ->downloadable()
                                                            ->openable()
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
                                                (ProductTag::all()->pluck('title')->toArray()),
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

                                        SpatieMediaLibraryFileUpload::make('seo.meta_image')
                                            ->collection('meta_images')
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


    protected function redirectToIntendedRoute(): void
    {
        $this->redirectRoute('dashboard.shop.products.edit', $this->product->id);
    }


    /**
     * @return void
     * @throws AuthorizationException
     * @throws ValidationException
     */
    public function saving(): void
    {
        $this->authorize('dashboard.shop.products.edit');

        $this->validate();

        QueryContainer::make()
            ->wrap(function () {

                $currentLocale = LaravelLocalization::getCurrentLocale();
                $data          = $this->form->getState();
                //                dd($data['categories']);

                $product = $this->product;

                $data[$currentLocale]['created_by'] = $product->translate($currentLocale)?->created_by ?? auth()->id();

                $product->update($data);

                $product->logSync('categories', $data['categories'], logColumns: ['title']);

                if (isset($data['categories']) && count($data['categories']) > 0) {
                    foreach ($data['categories'] as $categoryId) {
                        $product->categories()->firstOrCreate([
                            'product_category_id' => $categoryId,
                        ]);
                    }
                }

                if (isset($data['labels'])) {
                    $this->product()->deleteLabels();
                    foreach ($data['labels'] as $labelId) {
                        $product->labels()->firstOrCreate([
                            'id' => $labelId,
                        ]);
                    }
                }

                if (isset($data['tags']) && is_array($data['tags'])) {
                    $this->product()->tags()->detach();
                    // dd($data['tags']);

                    foreach ($data['tags'] as $tagTitle) {
                        $tag = ProductTag::whereTranslation('title', $tagTitle)->first();
                        if (!$tag) {
                            $tag = ProductTag::create([
                                'title' => $tagTitle,
                                'status' => ProductTagStatus::Published,
                                $currentLocale => ['created_by' => auth()->id()],
                            ]);
                        }
                        $product->tags()->attach($tag->id);

                        $tag->translateOrNew()->title = $tagTitle;
                        $tag->save();
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
     * @return mixed
     */
    public function render(): mixed
    {
        return view('shop::livewire.pages.product.edit')
            ->layout(AppLayouts::class, [
                'pageTitle'   => __('Edit Tag'),
                'breadcrumbs' => [
                    route('dashboard.home')                                 => __('Home'),
                    route('dashboard.shop.products')                        => __('Products'),
                    $this->product->getTitle(),
                    route('dashboard.shop.products.edit', $this->productID) => __('Edit'),
                ],

            ]);
    }
}
