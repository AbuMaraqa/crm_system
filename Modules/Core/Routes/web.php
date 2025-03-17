<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/23/24, 9:35 AM.
 * @Project: Jumla
 ************************************************/

use Illuminate\Support\Facades\Route;
use Livewire\Features\SupportFileUploads\FileUploadController;
use Livewire\Livewire;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Modules\Core\Http\Controllers\EmailVerificationController;
use Modules\Core\Livewire\Pages\Settings\ContactSettingsPage;

Route::group(['prefix' => LaravelLocalization::setLocale()], function () {
    Livewire::setUpdateRoute(function ($handle) {
        return Route::post('/livewire/update', $handle);
    });
});

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],

], function () {


    Route::group([
        'prefix' => config('project.dashboard_prefix'),
        'as' => 'dashboard.',

    ], function () {

        Route::get('/email/verify/{id}/{hash}', EmailVerificationController::class)
            ->middleware(['auth', 'signed'])->name('verification.verify');

        Route::group([
            'namespace' => 'Modules\Core\Livewire',
        ], function () {

            // Login Pages
            Route::get('login', Auth\Login::class)->name('login')->middleware('guest');
            Route::get('forgot-password', Auth\ForgotPassword::class)->name('password.request')->middleware('guest');
            Route::get('reset-password/{token}', Auth\ResetPassword::class)->name('password.reset')->middleware('guest');
            // End Login Pages

            Route::group([
                'middleware' => ['auth', 'can:dashboard.access'],
                'prefix' => 'account',
                'as' => 'account.',
                'namespace' => 'Auth',

            ], function () {

                Route::get('profile', Profile::class)->name('profile')->middleware('can:dashboard.account.profile');
                Route::get('profile/edit', EditProfile::class)->name('profile.edit')->middleware('can:dashboard.account.profile.edit');

                Route::group([
                    'middleware' => ['user.allowed'],
                ], function () {

                    Route::get('sessions', Session::class)->name('sessions')->middleware('can:dashboard.account.sessions');
                    Route::get('history', History::class)->name('history')->middleware('can:dashboard.account.history');
                    Route::get('notifications', Notifications::class)->name('notifications')->middleware('can:dashboard.account.notifications');
                    Route::get('change-password', ChangePassword::class)->name('change_password')->middleware('can:dashboard.account.change_password');
                });
            });

            Route::group([
                'middleware' => ['auth', 'can:dashboard.access', 'user.allowed'],
                'namespace' => 'Pages',

            ], function () {

                Route::get('/', Dashboard::class)->name('home');

                Route::group([
                    'namespace' => 'Settings',
                    'prefix' => 'settings',
                    'as' => 'settings.',
                ], function () {

                    Route::get('general-settings', GeneralSettingsPage::class)
                        ->name('general')
                        ->middleware('can:dashboard.settings.general');

                    Route::get('maintenance-settings', MaintenanceSettingsPage::class)
                        ->name('maintenance')
                        ->middleware('can:dashboard.settings.maintenance');

                    Route::get('smtp-settings', SmtpSettingsPage::class)
                        ->name('smtp')
                        ->middleware('can:dashboard.settings.smtp');

                    Route::get('google-recaptcha-settings', GoogleReCaptchaSettingsPage::class)
                        ->name('google_recaptcha')
                        ->middleware('can:dashboard.settings.google_recaptcha');

                    Route::get('date-time-settings', DateTimeSettingsPage::class)
                        ->name('datetime')
                        ->middleware('can:dashboard.settings.datetime');

                    Route::get('notification-settings', NotificationSettingsPage::class)
                        ->name('notification')
                        ->middleware('can:dashboard.settings.notification');

                    Route::get('contact_settings', ContactSettingsPage::class)
                        ->name('contact')
                        ->middleware('can:dashboard.settings.contact');
                });
            });
        });
    });

    Route::group([

        'namespace' => 'Modules\Core\Livewire\Pages',
        'prefix' => config('project.dashboard_prefix') . '/user-management',
        'middleware' => ['auth', 'verified:dashboard.account.profile', 'can:dashboard.access', 'user.allowed'],
        'as' => 'dashboard.user_management.',

    ], function () {

        Route::prefix('users')->group(function () {
            Route::get('/', Users\Index::class)->name('users')->middleware('can:dashboard.user_management.users');
            Route::get('create', Users\Create::class)->name('users.create')->middleware('can:dashboard.user_management.users.create');
            Route::get('{user}/edit', Users\Edit::class)->name('users.edit')->middleware('can:dashboard.user_management.users.edit');

            Route::get('{user}/view', Users\View::class)->name('users.view')->middleware('can:dashboard.user_management.users.view');
            Route::get('{user}/history', Users\History::class)->name('users.history')->middleware('can:dashboard.user_management.users.history');

            Route::get('{user}/change-password', Users\ChangePassword::class)->name('users.change_password')->middleware('can:dashboard.user_management.users.change_password');
            Route::get('{user}/sessions', Users\Sessions::class)->name('users.sessions')->middleware('can:dashboard.user_management.users.sessions');
            Route::get('{user}/messages', Users\Messages::class)->name('users.messages')->middleware('can:dashboard.user_management.users.messages');
        });

        Route::prefix('roles')->group(function () {
            Route::get('/', Roles\Index::class)->name('roles')->middleware('can:dashboard.user_management.roles');
            Route::get('create', Roles\Create::class)->name('roles.create')->middleware('can:dashboard.user_management.roles.create');
            Route::get('{role}/edit', Roles\Edit::class)->name('roles.edit')->middleware('can:dashboard.user_management.roles.edit');
        });

        Route::prefix('activity-logs')->group(function () {
            Route::get('/', ActivityLogs\Index::class)->name('activity_logs')->middleware('can:dashboard.user_management.activity_logs');
            Route::get('{activityLog}/View', ActivityLogs\View::class)
                ->name('activity_logs.view')
                ->middleware('can:dashboard.user_management.activity_logs.view');
            Route::get('{model}/{record}/activities', ActivityLogs\RecordActivities::class)
                ->name('activity_logs.record.activities')
                ->middleware('can:dashboard.user_management.activity_logs.record.activities');
        });
    });
});
