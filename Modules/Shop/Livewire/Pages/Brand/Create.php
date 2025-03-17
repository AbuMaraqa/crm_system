<?php

/*************************************************
 * Copyright (c) 2024.
 *
 * @Author : Shaker Awad <awadshaker74@gmail.com>
 * @Date   : 7/17/24, 6:58 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Shop\Livewire\Pages\Brand;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
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
use Modules\Core\Traits\HasFormControlButtons;
use Modules\Core\View\Components\AppLayouts;
use Modules\Shop\Entities\Brand;
use Modules\Shop\Enums\BrandStatus;

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

                                                $set('slug', Str::slug($state));
                                            })
                                            ->required()
                                            ->columnSpan([
                                                'default' => 12,
                                                'md'      => 6,
                                            ])
                                            ->live(onBlur: true)
                                            ->maxLength(255),

                                        TextInput::make('slug')
                                            ->label(__('Slug'))
                                            ->required()
                                            ->columnSpan([
                                                'default' => 12,
                                                'md'      => 6,
                                            ])
                                            ->unique(Brand::class, 'slug', ignoreRecord: true)
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
                                            ->type('warning')
                                            ->message(trans("You are now editing the :locale version", ['locale' => LaravelLocalization::getCurrentLocaleNative()])),
                                    ]),

                                Section::make()
                                    ->heading(__('Status'))
                                    ->schema([
                                        Select::make('status')
                                            ->label(__('Status'))
                                            ->options(BrandStatus::toArray())
                                            ->default(BrandStatus::Published)
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
                                    ->heading(__('Image'))
                                    ->schema([
                                        FileUpload::make('image')
                                            ->label(__('Image'))
                                            ->image()
                                            ->nullable()
                                            ->imageEditor()
                                            ->downloadable()
                                            ->openable()
                                            ->storeFiles(false)
                                            ->acceptedFileTypes(['image/png', 'image/jpeg', 'image/jpg']),
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
        $this->authorize('dashboard.shop.brands.create');

        $this->validate();

        QueryContainer::make()
            ->wrap(function () {
                $currentLocale = LaravelLocalization::getCurrentLocale();

                $formattedData = $data = $this->form->getState();

                $formattedData[$currentLocale]['created_by'] = auth()->id();
                $formattedData['seo']                        = [
                    'meta_title'       => $data['seo']['meta_title'] ?? $data['title'],
                    'meta_description' => $data['seo']['meta_description'] ?? strip_tags($data['description']),
                    'meta_keywords'    => $data['seo']['meta_keywords'] ?? '',
                ];

                $brand = Brand::create($formattedData);

                if (isset($data['image']) && $data['image'] instanceof TemporaryUploadedFile) {
                    $brand->addMedia($data['image']->getRealPath())->toMediaCollection('brands');
                }

                if (isset($data['seo']['meta_image']) && $data['seo']['meta_image'] instanceof TemporaryUploadedFile) {
                    $brand->addMedia($data['seo']['meta_image']->getRealPath())->toMediaCollection('meta_images');
                }

                Notification::make()
                    ->title(__('Saved Successfully.'))
                    ->body(__('The brand has been saved successfully.'))
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
        $this->redirectRoute('dashboard.shop.brands');
    }

    /**
     * @return mixed
     */
    public function render(): mixed
    {
        return view('shop::livewire.pages.brand.create')
            ->layout(AppLayouts::class, [
                'pageTitle'   => __('Create Brand'),
                'breadcrumbs' => [
                    route('dashboard.home')               => __('Home'),
                    route('dashboard.shop.brands')        => __('Brands'),
                    route('dashboard.shop.brands.create') => __('Create Brand'),
                ],
            ]);
    }
}
