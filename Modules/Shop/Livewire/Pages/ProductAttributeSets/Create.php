<?php

/*************************************************
 * Copyright (c) 2024.
 *
 * @Author : Shaker Awad <awadshaker74@gmail.com>
 * @Date   : 6/23/24, 9:35 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Shop\Livewire\Pages\ProductAttributeSets;

use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Notifications\Notification;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Modules\Core\Custom\Query\QueryContainer;
use Modules\Core\Filament\Forms\Components\Alert;
use Modules\Core\Filament\Forms\Components\CustomRadioField;
use Modules\Core\Filament\Forms\Components\Select;
use Modules\Core\Traits\HasFormControlButtons;
use Modules\Core\View\Components\AppLayouts;
use Modules\Shop\Entities\ProductAttributeSet;
use Modules\Shop\Enums\ProductAttributeSetDisplayLayout;
use Modules\Shop\Enums\ProductAttributeSetStatus;

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
                                            ->required()
                                            ->columnSpan([
                                                'default' => 12,
                                                'md'      => 12,
                                            ])
                                            ->maxLength(255),
                                    ]),

                                Section::make()
                                    ->heading(__("Attributes List"))
                                    ->schema([
                                        Repeater::make('attributes')
                                            ->schema([
                                                Checkbox::make('is_default')
                                                    ->label(__('Is Default?'))
                                                    ->fixIndistinctState()
                                                    ->required()
                                                    ->inline()
                                                    ->extraAttributes(['class' => 'success-checkbox-field'])
                                                    ->columnSpan(3),

                                                TextInput::make('title')
                                                    ->label(__('Title'))
                                                    ->required()
                                                    ->columnSpan(3)
                                                    ->maxLength(255),

                                                ColorPicker::make('color')
                                                    ->label(__('Color'))
                                                    ->columnSpan(3)
                                                    //                                                    ->visible(function (Get $get): bool {
                                                    //                                                        return $get('display_layout') == ProductAttributeSetDisplayLayout::COLOR;
                                                    //                                                    })
                                                    ->required(fn(Get $get): bool => $get('display_layout') === ProductAttributeSetDisplayLayout::COLOR),

                                                FileUpload::make('image')
                                                    ->label(__('Image'))
                                                    ->columnSpan(3)
                                                    ->required(fn(Get $get): bool => $get('display_layout') === ProductAttributeSetDisplayLayout::IMAGE),
                                            ])
                                            ->columns([
                                                'default' => 12,
                                                'md'      => 12,
                                            ])
                                            ->defaultItems(1)
                                            ->minItems(1)
                                            ->label(__('Attributes'))
                                            ->extraAttributes(['class' => 'attributes-repeater'])
                                            ->addAction(
                                                fn(Action $action) => $action
                                                    ->label(__('Add New Attribute'))
                                                    ->icon('heroicon-s-plus')
                                                    ->extraAttributes(['class' => 'add-new-attribute-repeater-button'])
                                            )
                                            ->reactive()
                                            ->addable()
                                            ->deletable()
                                            ->reorderable()
                                            ->reorderableWithDragAndDrop()
                                            ->collapsible()
                                            ->cloneable()
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
                                            ->options(ProductAttributeSetStatus::toArray())
                                            ->default(ProductAttributeSetStatus::Published)
                                            ->searchable()
                                            ->required(),

                                    ]),

                                Section::make()
                                    ->heading(__('Display Layout'))
                                    ->schema([
                                        Select::make('display_layout')
                                            ->label(__('Display Layout'))
                                            ->options(ProductAttributeSetDisplayLayout::toArray())
                                            ->default(ProductAttributeSetDisplayLayout::RADIO)
                                            ->searchable()
                                            ->required(),

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
        $this->authorize('dashboard.shop.product_attribute_sets.create');

        $this->validate();

        QueryContainer::make()
            ->wrap(function () {
                $currentLocale = LaravelLocalization::getCurrentLocale();

                $formattedData = $data = $this->form->getState();

                $formattedData[$currentLocale]['created_by'] = auth()->id();

                $attributes     = $formattedData['attributes'];
                $attributesData = [
                    'attributes'   => $attributes,
                    $currentLocale => $formattedData[$currentLocale],
                ];
                dd($formattedData);

                $productAttributeSet = ProductAttributeSet::create($formattedData);

                foreach ($attributes as $attribute) {
                    $image = $attribute['image'] ?? null;

                    if ($image instanceof TemporaryUploadedFile) {
                        $productAttributeSet->addMedia($image->getRealPath())->toMediaCollection('product_attributes');
                    }
                }


                Notification::make()
                    ->title(__('Saved Successfully.'))
                    ->body(__('The product category has been saved successfully.'))
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
        $this->redirectRoute('dashboard.shop.product_attribute_sets');
    }

    /**
     * @return mixed
     */
    public function render(): mixed
    {
        return view('shop::livewire.pages.product-attributes.create')
            ->layout(AppLayouts::class, [
                'pageTitle'   => __('Create Tag Attribute'),
                'breadcrumbs' => [
                    route('dashboard.home')                               => __('Home'),
                    route('dashboard.shop.product_attribute_sets')        => __('Tag Attributes'),
                    route('dashboard.shop.product_attribute_sets.create') => __('Create Tag Attribute'),
                ],
            ]);
    }
}
