<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Notifications\Auth;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\HtmlString;

class ResetPasswordByVerificationCodeNotification extends Notification
{
    /**
     * Create a notification instance.
     *
     * @return void
     */
    public function __construct(
        public string $token
    ) {
    }

    /**
     * Get the notification's channels.
     *
     * @param  mixed  $notifiable
     * @return array|string
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Build the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject(Lang::get('Reset Password'))
            ->greeting(Lang::get('Hello'))
            ->line(Lang::get('We have sent you this email in response to your request to reset your password'))
            ->line(new HtmlString("<div class='code'>{$this->token}</div>"))
            ->line(Lang::get('This password reset code will expire in :count minutes.', ['count' => config('auth.passwords.'.config('auth.defaults.passwords').'.expire')]))
            ->line(Lang::get('Please ignore this email if you did not request a password change.'))
            ->markdown('core::templates.notifications.email');
    }
}
