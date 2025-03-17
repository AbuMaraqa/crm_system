<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Http\Controllers;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Routing\Controller;
use Modules\Core\Notifications\GeneralNotification;

class EmailVerificationController extends Controller
{
    public function __invoke(EmailVerificationRequest $request)
    {
        $request->fulfill();

        $request->user()->notify((new GeneralNotification([
            'title' => 'Email Verified',
            'greeting' => 'Hello',
            'databaseLines' => [
                'Your email address has been verified.',
                'You can now benefit from all our services.',
            ],
        ], ['database']))->locale(config('app.locale')));

        return redirect()->route('dashboard.account.profile');
    }
}
