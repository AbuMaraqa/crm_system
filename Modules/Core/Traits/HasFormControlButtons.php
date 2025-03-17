<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Traits;

use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Route;

trait HasFormControlButtons
{
    protected function sendInValidRouteNotification(): Notification
    {
        return Notification::make()
            ->title(__('Redirect route is invalid.'))
            ->body(__('You will not be redirected anywhere.'))
            ->warning()
            ->send();
    }

    protected function isRedirectToRouteValid(): bool
    {
        if (! isset($this->redirectToRoute)) {
            return false;
        }

        if (! Route::has($this->redirectToRoute)) {
            return false;
        }

        return true;
    }

    protected function redirectToIntendedRoute(): void
    {
        if ($this->isRedirectToRouteValid()) {
            $this->redirectRoute($this->redirectToRoute);
        } else {
            $this->sendInValidRouteNotification();
        }
    }

    protected function isShouldRedirectAfterSave(): bool
    {
        return isset($this->shouldRedirectAfterSave) ? $this->shouldRedirectAfterSave : true;
    }

    public function save()
    {
        $this->saving();

        if ($this->isShouldRedirectAfterSave()) {
            $this->redirectToIntendedRoute();
        }
    }

    public function saveAndContinue()
    {
        $this->saving();
        $this->fillForm();
    }

    public function cancel()
    {
        $this->redirectToIntendedRoute();
    }
}
