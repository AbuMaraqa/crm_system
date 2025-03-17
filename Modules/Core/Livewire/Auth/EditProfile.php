<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/2/24, 9:34 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Livewire\Auth;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Infolists\Concerns\InteractsWithInfolists;
use Filament\Infolists\Contracts\HasInfolists;
use Filament\Notifications\Notification;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Modules\Core\Custom\Query\QueryContainer;
use Modules\Core\Entities\User;
use Modules\Core\Traits\HasFormControlButtons;
use Modules\Core\View\Components\AppLayouts;
use Ysfkaya\FilamentPhoneInput\Forms\PhoneInput;

class EditProfile extends Component implements HasForms, HasInfolists
{
    use HasFormControlButtons;
    use InteractsWithForms;
    use InteractsWithInfolists;

    public ?array $data = [];

    #[Computed()]
    public function user(): User
    {
        return auth()->user();
    }

    public function mount()
    {
        $this->fillForm();
    }

    private function fillForm(): void
    {
        $this->form->fill([
            'name' => $this->user->name,
            'email' => $this->user->email,
            'phone_number' => $this->user->phone_number,
            'roles' => $this->user->roles()->pluck('id')->toArray(),
        ]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(12)
                    ->schema([
                        Section::make(__('Basic Info'))
                            ->icon('ri-file-user-fill')
                            ->iconColor('info')
                            ->iconSize('lg')
                            ->columnSpan([
                                'default' => 12,
                                'lg' => 6,
                            ])
                            ->schema([

                                TextInput::make('name')
                                    ->label(__('Name'))
                                    ->prefixIcon('iconoir-user')
                                    ->required()
                                    ->string()
                                    ->maxLength(255),

                                TextInput::make('email')
                                    ->label(__('Email'))
                                    ->prefixIcon('iconoir-mail')
                                    ->required()
                                    ->string()
                                    ->email()
                                    ->maxLength(255),

                                PhoneInput::make('phone_number')
                                    ->label(__('Phone'))
                                    ->prefixIcon('iconoir-phone')
                                    ->unique(table: User::class, ignorable: $this->user)
                                    ->required(),

                            ]),
                        Section::make(__('Avatar'))
                            ->description(__('Enhance user profile with a custom avatar.'))
                            ->icon('heroicon-m-photo')
                            ->iconColor('success')
                            ->columnSpan([
                                'default' => 12,
                                'lg' => 6,
                            ])
                            ->schema([

                                FileUpload::make('avatar')
                                    ->label(__('Avatar'))
                                    ->image()
                                    ->storeFiles(false)
                                    ->imageEditor(),
                            ]),

                    ]),

            ])
            ->statePath('data');
    }

    /**
     * @return void
     */
    protected function redirectToIntendedRoute(): void
    {
        $this->redirectRoute('dashboard.account.profile');
    }

    /**
     * @return void
     * @throws AuthorizationException
     * @throws ValidationException
     */
    public function save()
    {
        $this->authorize('dashboard.account.profile.edit');

        $this->validate();

        QueryContainer::make()
            ->wrap(function () {

                $data = $this->form->getState();

                $this->user->update($data);

                if (isset($data['avatar']) && $data['avatar'] instanceof TemporaryUploadedFile) {
                    $this->user->addAvatar($data['avatar']->getRealPath());
                }

                Notification::make()
                    ->title(__('Saved Successfully.'))
                    ->success()
                    ->send();

                $this->fillForm();
            });
    }

    public function generateAvatar()
    {
        $this->authorize('dashboard.account.profile.edit');

        $this->user->generateAvatar();

        Notification::make()
            ->title(__('Generated successfully.'))
            ->success()
            ->send();
    }

    public function render()
    {

        return view('core::livewire.auth.edit-profile')
            ->layout(AppLayouts::class, [
                'pageTitle' => __('Edit Profile'),
                'breadcrumbs' => [
                    route('dashboard.home') => __('Home'),
                    route('dashboard.account.profile') => __('Profile'),
                    route('dashboard.account.profile.edit') => __('Edit Profile'),
                ],
            ]);
    }
}
