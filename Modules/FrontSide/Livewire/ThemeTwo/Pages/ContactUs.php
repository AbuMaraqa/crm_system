<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/24/24, 6:11 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\FrontSide\Livewire\ThemeTwo\Pages;

use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Modules\Core\Emails\GeneralEmail;
use Modules\Core\Services\Localization\Localization;
use Modules\Core\Services\Settings\ApplicationSettings;
use Modules\FrontSide\View\Components\ThemeTwo\Layouts\AppLayouts;

class ContactUs extends Component
{
    public $yourName;
    public $yourEmail;
    public $phoneNumber;
    public $yourCompany;
    public $yourSubject;
    public $yourMessage;

    protected $rules = [
        'yourName'    => 'required|string|max:255',
        'yourEmail'   => 'required|email|max:255',
        'phoneNumber' => 'required|max:20',
        'yourCompany' => 'nullable|string|max:255',
        'yourSubject' => 'required|string|max:255',
        'yourMessage' => 'nullable|string|max:5000',
    ];

    public function submit()
    {
        $this->validate();

        $applicationSettings = app(ApplicationSettings::class);
        $logoUrl             = $applicationSettings->getUrl('ltr_dark_site_logo', 'website-logo', 'logo-lg');

        if (app()->getLocale() == 'ar') {
            $logoUrl = $applicationSettings->getUrl('rtl_dark_site_logo', 'website-logo', 'logo-lg');
        }

        Mail::to(
            config('mail.from.address'),
            config('mail.from.name')
        )->locale(Localization::getCurrentLocale())
            ->send(new GeneralEmail([
                'logo'       => $logoUrl,
                'title'      => 'Contact Us',
                'subject'    => 'Contact Us',
                'greeting'   => 'Hello!',
                'introLines' => [
                    'You have received a new message from the contact form on your website.',
                ],
                'outroLines' => [
                    'Name: ' . $this->yourName,
                    'Email: ' . $this->yourEmail,
                    'Phone Number: ' . $this->phoneNumber,
                    'Company: ' . $this->yourCompany,
                    'Subject: ' . $this->yourSubject,
                    'Message: ' . $this->yourMessage,
                ],
                'actionText' => 'View Message',
                'actionUrl'  => route('frontside.contact-us'),
                'salutation' => 'Regards',
            ]));


        session()->flash('message', __('Your message has been sent successfully!'));

        // Clear the form
        $this->reset();
    }

    public function render()
    {
        $pageTitle = __('Contact Us');

        return view('frontside::livewire.theme-two.pages.contact-us')->layout(AppLayouts::class, [
            'pageTitle' => $pageTitle,
        ]);
    }
}
