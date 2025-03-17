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
use Modules\Shop\Entities\Banner;
use Modules\Shop\Entities\Banners;
use Modules\Shop\Entities\Brand;
use Modules\Shop\Enums\BannersStatus;

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
                                        FileUpload::make('image')
                                            ->label(__('Image'))
                                            ->image()
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


    /**
     * @return void
     * @throws AuthorizationException
     * @throws ValidationException
     */
    public function saving(): void
    {
        $this->authorize('dashboard.shop.banners.create');

        $this->validate();

        QueryContainer::make()
            ->wrap(function () {
                $currentLocale = LaravelLocalization::getCurrentLocale();

                $formattedData = $data = $this->form->getState();

                $formattedData[$currentLocale]['created_by'] = auth()->id();

                $banners = Banner::create($formattedData);

                if (isset($data['image']) && $data['image'] instanceof TemporaryUploadedFile) {
                    $banners->addMedia($data['image']->getRealPath())->toMediaCollection('banners');
                }

                Notification::make()
                    ->title(__('Saved Successfully.'))
                    ->body(__('The Banner has been saved successfully.'))
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
        $this->redirectRoute('dashboard.shop.banners');
    }

    /**
     * @return mixed
     */
    public function render(): mixed
    {
        return view('shop::livewire.pages.banners.create')
            ->layout(AppLayouts::class, [
                'pageTitle'   => __('Create Banner'),
                'breadcrumbs' => [
                    route('dashboard.home')               => __('Home'),
                    route('dashboard.shop.banners')        => __('Banners'),
                    route('dashboard.shop.banners.create') => __('Create Banner'),
                ],
            ]);
    }
}
