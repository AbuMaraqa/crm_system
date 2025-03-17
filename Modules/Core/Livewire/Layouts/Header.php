<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/2/24, 9:34 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Livewire\Layouts;

use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Modules\Core\Services\Settings\ApplicationSettings;
use Modules\Core\Traits\InteractsWithNotifications;

class Header extends Component implements HasActions, HasForms
{
    use InteractsWithActions;
    use InteractsWithForms;
    use InteractsWithNotifications;

    /**
     * @var mixed|null
     */
    public mixed $logoUrl;

    /**
     * @var Builder[]|Collection
     */
    public $userActivities;

    public function __construct()
    {
        $applicationSettings = app(ApplicationSettings::class);
        $this->logoUrl       = $applicationSettings->getUrl('ltr_light_site_logo', 'website-logo', 'logo-lg');

        if (app()->getLocale() == 'ar') {
            $this->logoUrl = $applicationSettings->getUrl('rtl_light_site_logo', 'website-logo', 'logo-lg');
        }
    }

    #[Computed()]
    public function user()
    {
        return auth()->user()->loadMissing(['roles']);
    }

    /**
     * @return mixed
     */
    #[Computed()]
    public function activites()
    {
        return $this->user->actions()->latest()->take(15)->get();
    }


    public function setWebsiteLocale(string $locale)
    {
        session()->put('locale', $locale);
        app()->setLocale($locale);

        return redirect(request()->header('Referer'));
    }

    public function impersonateLeave()
    {
        app('impersonate')->leave();

        return redirect(session('impersonate.back_to'));
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        session()->invalidate();
        session()->regenerateToken();

        redirect(route('dashboard.login'));
    }

    public function render()
    {
        return view("core::livewire.layouts.header");
    }
}
