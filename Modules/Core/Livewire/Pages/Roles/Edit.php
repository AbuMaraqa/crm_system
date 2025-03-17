<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/2/24, 9:34 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Livewire\Pages\Roles;

use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Modules\Core\Custom\Query\QueryContainer;
use Modules\Core\Entities\Role;
use Modules\Core\Traits\HasFormControlButtons;
use Modules\Core\View\Components\AppLayouts;
use Spatie\Permission\Models\Permission;

class Edit extends Component implements HasForms
{
    use HasFormControlButtons;
    use InteractsWithForms;

    #[Locked]
    public int $roleID;

    public ?array $data = [];

    #[Computed()]
    public function role(): Role
    {
        return Role::findOrFail($this->roleID);
    }

    /**
     * @param $role
     */
    public function mount($role): void
    {
        $this->roleID = $role;

        $this->fillForm();
    }

    private function fillForm(): void
    {
        $this->form->fill([
            'name' => $this->role->name,
            'permissions' => $this->role->permissions()->pluck('id')->toArray(),
        ]);
    }

    public function form(Form $form): Form
    {
        $permissions = Permission::get();

        $modules = [];
        foreach ($permissions->groupBy('module')->sortBy('module') as $name => $module) {
            $roles = [];
            foreach ($module->groupBy('group')->sortBy('group') as $label => $group) {
                $roles[] =
                    Fieldset::make(__($label))
                        ->columnSpan([
                            'default' => 12,
                            'sm' => 6,
                            'md' => 4,
                            'xl' => 3,
                        ])
                        ->schema([
                            CheckboxList::make('permissions')
                                ->label('')
                                ->bulkToggleable()
                                ->columnSpanFull()
                                ->options($group->sortBy('id')->map(function ($group) {
                                    $group->label = __($group->label);

                                    return $group;
                                })
                                    ->pluck('label', 'id'))
                                ->exists(Permission::class, 'id'),
                        ]);
            }

            $modules[] = Tab::make(__($name))
                ->icon('ri-shield-user-fill')
                ->id(Str::slug($name))
                ->schema($roles);
        }

        return $form
            ->schema([
                Grid::make()
                    ->columns([
                        'default' => 12,
                        'lg' => 12,
                    ])
                    ->schema([
                        Section::make()
                            ->heading(__('Role Information'))
                            ->columnSpanFull()
                            ->schema([
                                TextInput::make('name')
                                    ->label(__('Name'))
                                    ->unique(table: Role::class, ignorable: $this->role)
                                    ->required()
                                    ->maxLength(255),

                            ]),

                        Tabs::make()
                            ->columnSpanFull()
                            ->columns([
                                'default' => 12,
                                'lg' => 12,
                            ])
                            ->persistTabInQueryString()
                            ->tabs($modules),
                    ]),

            ])->statePath('data');
    }

    /**
     * @return void
     */
    protected function redirectToIntendedRoute(): void
    {
        $this->redirectRoute('dashboard.user_management.roles');
    }

    /**
     * @return void
     * @throws AuthorizationException
     * @throws ValidationException
     */
    public function saving(): void
    {
        $this->authorize('dashboard.user_management.roles.edit');

        $this->validate();

        QueryContainer::make()
            ->wrap(function () {

                $data = $this->form->getState();

                $this->role->update($data);

                $this->role->logSync('permissions', $data['permissions'], logColumns: ['id', 'group', 'label', 'name']);

                $this->role->syncPermissions($data['permissions']);

                Notification::make()
                    ->title(__('Saved Successfully.'))
                    ->success()
                    ->send();

                $this->fillForm();
            });
    }

    public function render()
    {
        return view('core::livewire.pages.roles.edit')
            ->layout(AppLayouts::class, [
                'pageTitle' => __('Edit Role'),
                'breadcrumbs' => [
                    route('dashboard.home') => __('Home'),
                    route('dashboard.user_management.roles') => __('Roles'),
                    route('dashboard.user_management.roles.edit', $this->role->id) => __('Edit Role'),
                ],
            ]);
    }
}
