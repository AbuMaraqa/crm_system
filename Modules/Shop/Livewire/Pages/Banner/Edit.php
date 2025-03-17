<?php

/*************************************************
 * Copyright (c) 2024.
 *
 * @Author : Shaker Awad <awadshaker74@gmail.com>
 * @Date   : 7/17/24, 6:58 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Shop\Livewire\Pages\Banner;

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
use Modules\Shop\Entities\Banner;
use Modules\Shop\Entities\Brand;
use Modules\Shop\Enums\BannersStatus;
use Modules\Shop\Enums\BrandStatus;

class Edit extends Component implements HasForms
{
    use HasFormControlButtons;
    use InteractsWithForms;


    public ?array $data = [];

    #[Locked]
    public int $bannerID;

    /**
     * @param $banner
     *
     * @return void
     */
    public function mount($banner): void
    {
        $this->bannerID = $banner;
        $this->fillForm();
    }

    /**
     * @return Builder|Builder[]|Collection|Model|null
     */
    #[Computed()]
    public function banner(): Model|Collection|Builder|array|null
    {
        return Banner::findOrFail($this->bannerID);
    }

    /**
     * @return void
     */
    private function fillForm(): void
    {
        $data = $this->banner->toArray();

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
                                                                                    ->columnSpan([
                                            'default' => 12,
                                            'md'      => 12,
                                        ])
                                        ->live(onBlur: true)
                                        ->maxLength(255),

                                    TextInput::make('label_button')
                                        ->label(__('Label Button'))
                                        ->columnSpan([
                                            'default' => 12,
                                            'md'      => 6,
                                        ])
                                        ->maxLength(255),

                                    TextInput::make('link')
                                    ->label(__('Link'))
                                    ->required()
                                    ->columnSpan([
                                        'default' => 12,
                                        'md'      => 6,
                                    ])
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
                                ->heading(__('Type'))
                                ->schema([
                                    Select::make('type')
                                        ->label(__('Type'))
                                        ->options(BannersStatus::toArray())
                                        ->default(BannersStatus::MAIN_BANNERS)
                                        ->searchable()
                                        ->required(),

                                ]),

                            Section::make()
                                ->heading(__('Image'))
                                ->schema([

                                        SpatieMediaLibraryFileUpload::make('image')
                                        ->label(__('Image'))
                                        ->image()
                                        ->collection('banners')
                                        ->model($this->banner)
                                        ->nullable()
                                        ->imageEditor()
                                        ->downloadable()
                                        ->openable()
                                        ->required()
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
        $this->redirectRoute('dashboard.shop.banners.edit', $this->banner->id);
    }


    /**
     * @return void
     * @throws AuthorizationException
     * @throws ValidationException
     */
    public function saving(): void
    {
        $this->authorize('dashboard.shop.banners.edit');

        $this->validate();

        QueryContainer::make()
            ->wrap(function () {
                $currentLocale = LaravelLocalization::getCurrentLocale();
                $data          = $this->form->getState();

                $banner = $this->banner;

                $data[$currentLocale]['created_by'] = $banner->translate($currentLocale)?->created_by ?? auth()->id();

                $banner->update($data);

                Notification::make()
                    ->title(__('Saved Successfully.'))
                    ->body(__('The banner has been saved successfully.'))
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
        return view('shop::livewire.pages.banners.edit')
            ->layout(AppLayouts::class, [
                'pageTitle'   => __('Edit Brand'),
                'breadcrumbs' => [
                    route('dashboard.home')                             => __('Home'),
                    route('dashboard.shop.banners')                      => __('Brands'),
                    $this->banner->getTitle(),
                    route('dashboard.shop.banners.edit', $this->bannerID) => __('Edit'),
                ],

            ]);
    }
}
