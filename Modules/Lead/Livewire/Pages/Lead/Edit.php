<?php

namespace Modules\Lead\Livewire\Pages\Lead;

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
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Locked;
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
use Modules\GeoLocation\Entities\City;
use Modules\GeoLocation\Entities\Country;
use Modules\GeoLocation\Entities\District;
use Modules\GeoLocation\Entities\Governorate;
use Modules\Lead\Entities\Lead;

class Edit extends Component implements HasForms
{
    use HasFormControlButtons;
    use InteractsWithForms;


    public ?array $data = [];

    #[Locked]
    public int $leadID;

    /**
     * @param $lead
     *
     * @return void
     */
    public function mount($lead): void
    {
        $this->leadID = $lead;
        $this->fillForm();
    }

    /**
     * @return Builder|Builder[]|Collection|Model|null
     */
    #[Computed()]
    public function lead(): Model|Collection|Builder|array|null
    {
        return Lead::findOrFail($this->leadID);
    }

    /**
     * @return void
     */
    private function fillForm(): void
    {
        $data               = $this->lead->toArray();
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
                                        TextInput::make('name')
                                            ->label(__('Name'))
                                            ->columnSpan([
                                                'default' => 12,
                                                'md'      => 6,
                                            ])
                                            ->required()
                                            ->maxLength(255),

                                        TextInput::make('business_name')
                                            ->label(__('Business Name'))
                                            ->columnSpan([
                                                'default' => 12,
                                                'md'      => 6,
                                            ])
                                            ->required()
                                            ->maxLength(255),

                                        TextInput::make('email')
                                            ->label(__('Email'))
                                            ->columnSpan(6)
                                            ->required(),

                                        TextInput::make('phone')
                                            ->label(__('Phone'))
                                            ->columnSpan(6)
                                            ->numeric()
                                            ->required(),

                                        Textarea::make('address')
                                            ->label(__('Address'))
                                            ->columnSpan([
                                                'default' => 12,
                                                'md'      => 12,
                                            ])
                                            ->rows(5)
                                            ->nullable(),
                                    ]),

                                Section::make()
                                    ->heading(__('Geo Location Details'))
                                    ->schema([
                                        Grid::make()
                                            ->columnSpan([
                                                'default' => 12,
                                                'md'      => 8,
                                            ])
                                            ->schema([
                                                Select::make('country')
                                                    ->label(__('Country'))
                                                    ->options(Country::all()->pluck('en_common_name', 'id')->filter()->toArray())
                                                    ->searchable()
                                                    ->required(),

                                                Select::make('governorate')
                                                    ->label(__('Governorate'))
                                                    ->options(Governorate::all()->pluck('en_name', 'id')->filter()->toArray())
                                                    ->searchable()
                                                    ->required(),

                                                Select::make('city')
                                                    ->label(__('City'))
                                                    ->options(City::all()->pluck('en_name', 'id')->filter()->toArray())
                                                    ->searchable()
                                                    ->required(),

                                                Select::make('district')
                                                    ->label(__('District'))
                                                    ->options(District::all()->pluck('en_name', 'id')->filter()->toArray())
                                                    ->searchable()
                                                    ->required(),
                                            ]),

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
        $this->authorize('dashboard.lead.leads.create');

        $this->validate();

        QueryContainer::make()
            ->wrap(function () {
                $currentLocale = LaravelLocalization::getCurrentLocale();
                $data          = $this->form->getState();

                $lead = $this->lead;

                $data[$currentLocale]['created_by'] = $lead->translate($currentLocale)?->created_by ?? auth()->id();

                $lead->update($data);

                Notification::make()
                    ->title(__('Saved Successfully.'))
                    ->body(__('The lead has been saved successfully.'))
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
        $this->redirectRoute('dashboard.lead.leads');
    }

    /**
     * @return mixed
     */
    public function render(): mixed
    {
        return view('lead::livewire.pages.lead.create')
            ->layout(AppLayouts::class, [
                'pageTitle'   => __('Edit Lead'),
                'breadcrumbs' => [
                    route('dashboard.home')                 => __('Home'),
                    route('dashboard.lead.leads')        => __('Lead Leads'),
                    route('dashboard.lead.leads.create') => __('Edit Lead'),
                ],
            ]);
    }
}
