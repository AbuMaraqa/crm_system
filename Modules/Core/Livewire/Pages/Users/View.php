<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Livewire\Pages\Users;

use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Infolists\Components\Actions;
use Filament\Infolists\Components\Section as ComponentsSection;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Concerns\InteractsWithInfolists;
use Filament\Infolists\Contracts\HasInfolists;
use Filament\Infolists\Infolist;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Modules\Core\Entities\User;
use Modules\Core\Filament\Infolists\Actions\Impersonate;
use Modules\Core\Services\Formatters\Phone;
use Modules\Core\View\Components\AppLayouts;

class View extends Component implements HasForms, HasInfolists
{
    use InteractsWithForms;
    use InteractsWithInfolists;

    #[Locked]
    public int $userID;

    #[Computed()]
    public function user()
    {
        return User::findOrFail($this->userID);
    }

    public function mount($user)
    {
        $this->userID = $user;
    }

    public function userInfolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->record($this->user)
            ->schema([
                ComponentsSection::make()
                    ->schema([
                        Actions::make([
                            Impersonate::make()
                                ->label(__('Login'))
                                ->backTo(route('dashboard.user_management.users.view', [$this->user->id]))
                                ->link()
                                ->authorize('dashboard.user_management.users.impersonate')
                                ->requiresConfirmation(),
                        ])
                            ->alignEnd(),

                        TextEntry::make('name')
                            ->label(__('Name'))
                            ->inlineLabel(),

                        TextEntry::make('email')
                            ->label(__('Email'))
                            ->inlineLabel(),

                        TextEntry::make('phone_number')
                            ->label(__('Phone'))
                            ->inlineLabel()
                            ->formatStateUsing(function (string $state) {
                                return Phone::make()->state($state)->renderAsHtml();
                            })
                            ->html(),

                        TextEntry::make('phone_number')
                            ->label(__('Phone'))
                            ->inlineLabel()
                            ->formatStateUsing(function (string $state) {
                                return Phone::make()->state($state)->renderWhatsUpAsHtml();
                            })
                            ->html(),

                    ]),

            ]);
    }

    public function render()
    {
        $roles = $this->user->roles()->with('permissions')->get();

        return view('core::livewire.pages.users.view', [
            'roles' => $roles,

        ])->layout(AppLayouts::class, [
            'pageTitle' => __('View User'),
            'breadcrumbs' => [
                route('dashboard.home') => __('Home'),
                route('dashboard.user_management.users') => __('Users'),
                route('dashboard.user_management.users.view', [$this->user->id]) => __('View User'),
            ],
        ]);
    }
}
