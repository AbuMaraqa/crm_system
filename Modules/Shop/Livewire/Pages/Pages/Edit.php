<?php

/*************************************************
 * Copyright (c) 2024.
 *
 * @Author : Shaker Awad <awadshaker74@gmail.com>
 * @Date   : 7/17/24, 6:58 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Shop\Livewire\Pages\Pages;

use Filament\Forms\Components\FileUpload;
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
use Modules\Shop\Entities\Brand;
use Modules\Shop\Entities\Page;
use Modules\Shop\Enums\BrandStatus;
use Modules\Shop\Enums\PagesSlugStatus;

class Edit extends Component implements HasForms
{
    use HasFormControlButtons;
    use InteractsWithForms;


    public ?array $data = [];

    #[Locked]
    public int $pageID;

    /**
     * @param $page
     *
     * @return void
     */
    public function mount($page): void
    {
        $this->pageID = $page;
        $this->fillForm();
    }

    /**
     * @return Builder|Builder[]|Collection|Model|null
     */
    #[Computed()]
    public function page(): Model|Collection|Builder|array|null
    {
        return Page::findOrFail($this->pageID);
    }

    /**
     * @return void
     */
    private function fillForm(): void
    {
        $data = $this->page->toArray();

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
                                            ->live(onBlur: true)
                                            ->maxLength(255),

                                        TextInput::make('content')
                                            ->label(__('Content'))
                                            ->required()
                                            ->columnSpan([
                                                'default' => 12,
                                                'md'      => 6,
                                            ])
                                            ->live(onBlur: true)
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
                                    ->heading(__('Slug'))
                                    ->schema([
                                        Select::make('slug')
                                            ->label(__('Slug'))
                                            ->options(PagesSlugStatus::toArray())
                                            ->default(PagesSlugStatus::ABOUT_US)
                                            ->searchable()
                                            ->unique(
                                                Page::class , 'slug', ignorable: $this->page
                                            )
                                            ->required(),

                                    ]),

                                Section::make()
                                    ->heading(__('Image'))
                                    ->schema([
                                        SpatieMediaLibraryFileUpload::make('image')
                                        ->collection('about_us')
                                        ->label(__('Image'))
                                        ->image()
                                        ->nullable()
                                        ->imageEditor()
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
                                    ]),
                            ]),
                    ]),
            ])
            ->statePath('data');
    }


    protected function redirectToIntendedRoute(): void
    {
        $this->redirectRoute('dashboard.shop.pages.edit', $this->page->id);
    }


    /**
     * @return void
     * @throws AuthorizationException
     * @throws ValidationException
     */
    public function saving(): void
    {
        $this->authorize('dashboard.shop.pages.edit');

        $this->validate();

        QueryContainer::make()
            ->wrap(function () {
                $currentLocale = LaravelLocalization::getCurrentLocale();
                $data          = $this->form->getState();

                $page = $this->page;

                $data[$currentLocale]['created_by'] = $page->translate($currentLocale)?->created_by ?? auth()->id();

                $page->update($data);

                Notification::make()
                    ->title(__('Saved Successfully.'))
                    ->body(__('The Page has been saved successfully.'))
                    ->success()
                    ->send();

                $this->fillForm();
            });
    }

    /**g
     * @return mixed
     */
    public function render(): mixed
    {
        return view('shop::livewire.pages.page.edit')
            ->layout(AppLayouts::class, [
                'pageTitle'   => __('Edit Page'),
                'breadcrumbs' => [
                    route('dashboard.home')                             => __('Home'),
                    route('dashboard.shop.pages')                      => __('Pages'),
                    $this->page->getTitle(),
                    route('dashboard.shop.pages.edit', $this->pageID) => __('Edit'),
                ],

            ]);
    }
}
