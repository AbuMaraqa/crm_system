<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/2/24, 9:34 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Livewire\Widgets;

use Filament\Widgets\Widget;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Lazy;
use Modules\Core\Services\Localization\Localization;

#[Lazy]
class WelcomeMessage extends Widget
{
    public function render(): View
    {
        $authUser = auth()->user();

        Carbon::setLocale(Localization::getCurrentLocale());

        $today = Carbon::today();
        $todayDay = $today->format('l');
        $todayDate = $today->format('F j, Y');

        return view('core::livewire.widgets.welcome-message', [
            'authUser' => $authUser,
            'todayDay' => $todayDay,
            'todayDate' => $todayDate,
        ]);
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        session()->invalidate();
        session()->regenerateToken();

        redirect(route('dashboard.login'));
    }
}
