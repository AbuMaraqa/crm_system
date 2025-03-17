<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Notifications;

use Filament\Notifications\Notification as FilamentNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Modules\Core\Services\Localization\Localization;

class GeneralNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(
        public array $data,
        public array $via = ['mail', 'database']
    ) {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via(object $notifiable)
    {
        return $this->via;
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        Localization::setLocale($this->locale);

        $mailMessage = new MailMessage;

        if (isset($this->data['title']) && $this->data['title']) {
            $mailMessage->subject(__($this->data['title']));
        }

        if (isset($this->data['greeting']) && $this->data['greeting']) {
            $mailMessage->greeting($this->data['greeting']);
        }

        if (isset($this->data['introLines']) && $this->data['introLines']) {
            $mailMessage->lines($this->data['introLines']);
        }

        if (isset($this->data['actionText']) && $this->data['actionText']) {
            $mailMessage->action($this->data['actionText'], $this->data['actionUrl']);
        }

        if (isset($this->data['outroLines']) && $this->data['outroLines']) {
            $mailMessage->lines($this->data['outroLines']);
        }

        if (isset($this->data['salutation']) && $this->data['salutation']) {
            $mailMessage->salutation($this->data['salutation']);
        }

        return $mailMessage
            ->markdown('core::templates.notifications.email');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     */
    public function toArray(object $notifiable): array
    {
        return FilamentNotification::make()
            ->title($this->data['title'])
            ->body(function (): ?string {
                if (isset($this->data['body']) && $this->data['body']) {
                    $output['body'] = $this->data['body'];
                }

                return null;
            })
            ->getDatabaseMessage();
    }
}
