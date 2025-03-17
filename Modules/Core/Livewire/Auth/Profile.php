<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Livewire\Auth;

use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Infolists\Components\Grid as ComponentsGrid;
use Filament\Infolists\Components\Section as ComponentsSection;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Concerns\InteractsWithInfolists;
use Filament\Infolists\Contracts\HasInfolists;
use Filament\Infolists\Infolist;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\RateLimiter;
use illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Modules\Core\Entities\User;
use Modules\Core\View\Components\AppLayouts;
use Throwable;

class Profile extends Component implements HasForms, HasInfolists
{
    use InteractsWithForms;
    use InteractsWithInfolists;

    public function sendVerificationRequest(): void
    {
        $this->ensureIsNotRateLimited();

        try {
            $this->user->sendEmailVerificationNotification();

            Notification::make()
                ->title(__('Process Succeeded'))
                ->body(__('Your request will be processed as quickly as possible.'))
                ->success()
                ->send();

            RateLimiter::hit($this->throttleKey());

        } catch (Throwable $th) {
            Log::error($th->getMessage());

            Notification::make()
                ->title(__('Process Failed'))
                ->body(__('Something went wrong!'))
                ->danger()
                ->send();
        }
    }

    public function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 1)) {
            return;
        }

        $seconds = RateLimiter::availableIn($this->throttleKey());

        Notification::make()
            ->title(__('Email Verification Failed'))
            ->body(trans('Too many attempts. Please try again in :seconds seconds.', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]))
            ->danger()
            ->send();

        throw ValidationException::withMessages([]);
    }

    public function throttleKey(): string
    {
        return Str::transliterate('verify-email:'.Str::lower($this->user->email).'|'.request()->ip());
    }

    #[Computed()]
    public function user(): User
    {
        return auth()->user();
    }

    public function userInfolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->record($this->user)
            ->schema([
                ComponentsSection::make('User Summary')
                    ->label(__('User Summary'))
                    ->schema([
                        ComponentsGrid::make(12)
                            ->schema([
                                TextEntry::make('name')
                                    ->label('Name')
                                    ->columnSpan(6),

                                TextEntry::make('email')
                                    ->label(__('Email'))
                                    ->columnSpan(6),
                            ]),
                        ComponentsGrid::make(12)
                            ->schema([
                                TextEntry::make('state.country.name')
                                    ->label('Country')
                                    ->columnSpan(4),

                                TextEntry::make('state.name')
                                    ->label(__('State'))
                                    ->columnSpan(4),

                                TextEntry::make('city_name')
                                    ->label(__('City'))
                                    ->columnSpan(4),
                            ]),
                        ComponentsGrid::make(12)
                            ->schema([
                                TextEntry::make('phone_number')
                                    ->label('Phone')
                                    ->columnSpan(6),

                                TextEntry::make('address')
                                    ->label('Address')
                                    ->columnSpan(6),

                            ]),

                    ])
                    ->icon('heroicon-m-user')
                    ->collapsible(),

            ]);
    }

    public function render()
    {
        $messages = $this->user->messages()->open()->get();
        $roles = $this->user->roles()->with('permissions')->get();

        return view('core::livewire.auth.profile', [
            'messages' => $messages,
            'roles' => $roles,
        ])
            ->layout(AppLayouts::class, [
                'pageTitle' => __('Profile'),
                'breadcrumbs' => [
                    route('dashboard.home') => __('Home'),
                    route('dashboard.account.profile') => __('Profile'),
                ],
            ]);
    }
}
