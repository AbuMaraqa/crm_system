<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 7/15/24, 6:35 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Livewire\Layouts;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Modules\Core\Services\Settings\ApplicationSettings;
use Modules\Core\Services\Sidebar\Sidebar as SidebarSidebar;

class Sidebar extends Component
{
    /**
     * @var mixed|null
     */
    public mixed $logoUrl;
    public mixed $faviconUrl;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $applicationSettings = app(ApplicationSettings::class);

        $this->faviconUrl = $applicationSettings->getUrl('website_favicon', 'website-favicons', 'apple-icon-180x180');
        $this->logoUrl    = $applicationSettings->getUrl('ltr_dark_site_logo', 'website-logo', 'logo-lg');

        if (app()->getLocale() == 'ar') {
            $this->logoUrl = $applicationSettings->getUrl('rtl_dark_site_logo', 'website-logo', 'logo-lg');
        }
    }

    #[Computed()]
    public function user()
    {
        return auth()->user()->loadMissing(['roles']);
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

    public function render(SidebarSidebar $sidebar)
    {
        return view("core::livewire.layouts.sidebar", [
            'sidebar' => $sidebar,
        ]);
    }
}
