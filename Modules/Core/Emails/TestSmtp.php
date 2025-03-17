<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TestSmtp extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public string $title = '';

    public string $greeting = '';

    public array $introLines = [];

    public array $outroLines = [];

    public string $actionText = '';

    public string $actionUrl = '';

    public string $salutation = '';

    /**
     * Create a new message instance.
     */
    public function __construct(public array $data)
    {

    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->title,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {

        if (isset($this->data['title']) && $this->data['title']) {
            $this->title = $this->data['title'];
        }

        if (isset($this->data['greeting']) && $this->data['greeting']) {
            $this->greeting = $this->data['greeting'];
        }

        if (isset($this->data['introLines']) && $this->data['introLines']) {
            $this->introLines = $this->data['introLines'];
        }

        if (isset($this->data['actionText']) && $this->data['actionText']) {
            $this->actionText = $this->data['actionText'];
        }

        if (isset($this->data['actionUrl']) && $this->data['actionUrl']) {
            $this->actionUrl = $this->data['actionUrl'];
        }

        if (isset($this->data['outroLines']) && $this->data['outroLines']) {
            $this->outroLines = $this->data['outroLines'];
        }

        if (isset($this->data['salutation']) && $this->data['salutation']) {
            $this->salutation = $this->data['salutation'];
        }

        return new Content(
            markdown: 'core::templates.emails.test-smtp',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
