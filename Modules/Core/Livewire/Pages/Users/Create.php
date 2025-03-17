<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/2/24, 9:34 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Livewire\Pages\Users;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Modules\Core\Custom\Query\QueryContainer;
use Modules\Core\Entities\User;
use Modules\Core\Traits\HasFormControlButtons;
use Modules\Core\View\Components\AppLayouts;
use Spatie\Permission\Models\Role;
use Ysfkaya\FilamentPhoneInput\Forms\PhoneInput;

class Create extends Component implements HasForms
{
    use HasFormControlButtons;
    use InteractsWithForms;

    public ?array $data = [];

    public function mount()
    {
        $this->fillForm();
    }

    private function fillForm(): void
    {
        $this->form->fill();
    }

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
                                Section::make(__('Basic Info'))
                                    ->description(__('Set the Basic information of the user'))
                                    ->icon('heroicon-m-user')
                                    ->iconColor('info')
                                    ->schema([
                                        TextInput::make('name')
                                            ->label(__('Name'))
                                            ->prefixIcon('iconoir-user')
                                            ->columnSpan([
                                                'default' => 12,
                                                'md'      => 6,
                                            ])
                                            ->required()
                                            ->string()
                                            ->maxLength(255),

                                        TextInput::make('email')
                                            ->label(__('Email'))
                                            ->prefixIcon('iconoir-mail')
                                            ->columnSpan([
                                                'default' => 12,
                                                'md'      => 6,
                                            ])
                                            ->unique(User::class)
                                            ->required()
                                            ->string()
                                            ->email()
                                            ->maxLength(255),

                                        TextInput::make('password')
                                            ->label(__('Password'))
                                            ->prefixIcon('clarity-lock-line')
                                            ->columnSpan([
                                                'default' => 12,
                                                'md'      => 6,
                                            ])
                                            ->required()
                                            ->confirmed()
                                            ->string()
                                            ->password()
                                            ->revealable()
                                            ->maxLength(255),

                                        TextInput::make('password_confirmation')
                                            ->label(__('Password Confirmation'))
                                            ->prefixIcon('clarity-lock-line')
                                            ->columnSpan([
                                                'default' => 12,
                                                'md'      => 6,
                                            ])
                                            ->required()
                                            ->string()
                                            ->password()
                                            ->revealable()
                                            ->dehydrated(false)
                                            ->maxLength(255),

                                        PhoneInput::make('phone_number')
                                            ->label(__('Phone'))
                                            ->prefixIcon('iconoir-phone')
                                            ->columnSpan(12)
                                            ->unique(User::class)
                                            ->required(),

                                        Toggle::make('make_email_confirmed')
                                            ->label(__('Make Email Confirmed'))
                                            ->columnSpan(12),
                                    ]),
                            ]),

                        Grid::make()
                            ->columnSpan([
                                'default' => 12,
                                'md'      => 4,
                            ])
                            ->schema([
                                Section::make(__('Avatar'))
                                    ->icon('heroicon-m-camera')
                                    ->iconColor('warning')
                                    ->columnSpan([
                                        'default' => 12,
                                        'xl'      => 4,
                                    ])
                                    ->schema([
                                        FileUpload::make('avatar')
                                            ->label(__('Avatar'))
                                            ->columnSpan(12)
                                            ->avatar()
                                            ->image()
                                            ->storeFiles(false)
                                            ->imageEditor(),
                                    ]),

                                Section::make(__('Roles'))
                                    ->description(__('Give the user a suitable role with associated permissions'))
                                    ->icon('heroicon-m-cog-6-tooth')
                                    ->iconColor('danger')
                                    ->columnSpan([
                                        'default' => 12,
                                        'xl'      => 4,
                                    ])
                                    ->schema([
                                        Select::make('roles')
                                            ->label(__('Roles'))
                                            ->required()
                                            ->multiple()
                                            ->options(Role::all()->pluck('name', 'id'))
                                            ->searchable()
                                            ->preload(),
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
        $this->authorize('dashboard.user_management.users.create');

        $this->validate();

        QueryContainer::make()
            ->wrap(function () {

                $data = $this->form->getState();

                if ($data['make_email_confirmed']) {
                    $data['email_verified_at'] = now();
                }

                $user = User::create($data);

                $user->logSync('roles', $data['roles'], logColumns: ['name']);

                $user->syncRoles($data['roles']);

                if (isset($data['avatar']) && $data['avatar'] instanceof TemporaryUploadedFile) {
                    $user->addAvatar($data['avatar']->getRealPath());
                } else {
                    $user->generateAvatar();
                }

                Notification::make()
                    ->title(__('Saved Successfully.'))
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
        $this->redirectRoute('dashboard.user_management.users');
    }

    public function render()
    {
        return view('core::livewire.pages.users.create')
            ->layout(AppLayouts::class, [
                'pageTitle'   => __('Create User'),
                'breadcrumbs' => [
                    route('dashboard.home')                         => __('Home'),
                    route('dashboard.user_management.users')        => __('Users'),
                    route('dashboard.user_management.users.create') => __('Create User'),
                ],
            ]);
    }
}
