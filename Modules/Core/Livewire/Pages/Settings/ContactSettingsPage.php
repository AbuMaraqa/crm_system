<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/23/24, 9:35 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Livewire\Pages\Settings;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\Section as ComponentsSection;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Concerns\InteractsWithInfolists;
use Filament\Infolists\Contracts\HasInfolists;
use Filament\Infolists\Infolist;
use Filament\Notifications\Notification;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Modules\Core\Services\Settings\ApplicationSettings;
use Modules\Core\Traits\HasFormControlButtons;
use Modules\Core\View\Components\AppLayouts;

class ContactSettingsPage extends Component implements HasForms, HasInfolists
{
    use HasFormControlButtons;
    use InteractsWithForms;
    use InteractsWithInfolists;

    public array $data = [];

    public function mount(ApplicationSettings $applicationSettings)
    {
        // $social =json_decode($applicationSettings->getValue('social'));

        $this->form->fill([
            'address'            => $applicationSettings->getValue('address'),
            'phone'              => $applicationSettings->getValue('phone'),
            'email'              => $applicationSettings->getValue('email'),
            'whats_app'              => $applicationSettings->getValue('whats_app'),
            'facebook'              => $applicationSettings->getValue('facebook'),
            'twitter'              => $applicationSettings->getValue('twitter'),
            'instgram'              => $applicationSettings->getValue('instgram'),
            'linked_in'              => $applicationSettings->getValue('linked_in'),
            'tiktok'              => $applicationSettings->getValue('tiktok'),
            'telegram'              => $applicationSettings->getValue('telegram'),
        ]);
    }

    public function form(Form $form): Form
    {
        return $form
    ->schema([
        Grid::make()
            ->columns([
                'default' => 12,
                'md'      => 12,
            ])
            ->schema([
                Section::make(__('Contact Information'))
                    ->schema([
                        RichEditor::make('address')
                            ->label(__('Address')),

                        TextInput::make('phone')
                            ->label(__('Phone'))
                            ->tel()
                            ->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/'),

                        TextInput::make('email')
                            ->label(__('email'))
                            ->email()
                    ])
                    ->columnSpan(6),

                Section::make(__('Social Information'))
                    ->schema([
                        TextInput::make('whats_app')
                            ->label(__('WhatApp')),

                        TextInput::make('facebook')
                        ->label(__('Facebook')),

                        TextInput::make('twitter')
                        ->label(__('Twitter')),

                        TextInput::make('instgram')
                        ->label(__('Instgram')),

                        TextInput::make('linked_in')
                        ->label(__('Linked In')),

                        TextInput::make('tiktok')
                        ->label(__('TikTok')),

                        TextInput::make('telegram')
                        ->label(__('Telegram')),
                    ])
                    ->columnSpan(6)
            ]),
    ])
    ->statePath('data');
    }

    /**
     * @return void
     */
    protected function redirectToIntendedRoute(): void
    {
        $this->redirectRoute('dashboard.settings.contact');
    }

    /**
     * @return void
     * @throws AuthorizationException
     * @throws ValidationException
     */
    public function saving(): void
    {
        $applicationSettings = app(ApplicationSettings::class);
        $this->authorize('dashboard.settings.contact');

        $this->validate();

        $data = $this->form->getState();
        // dd($data);
        $applicationSettings->set('address', $data['address']);
        $applicationSettings->set('phone', $data['phone']);
        $applicationSettings->set('email', $data['email']);
        // $applicationSettings->set('social',json_encode($data['social']));
        $applicationSettings->set('whats_app', $data['whats_app']);
        $applicationSettings->set('facebook', $data['facebook']);
        $applicationSettings->set('twitter', $data['twitter']);
        $applicationSettings->set('instgram', $data['instgram']);
        $applicationSettings->set('linked_in', $data['linked_in']);
        $applicationSettings->set('tiktok', $data['tiktok']);
        $applicationSettings->set('telegram', $data['telegram']);

        Notification::make()
            ->title(__('Saved Successfully.'))
            ->success()
            ->send();
    }

    /**
     * @return mixed
     */
    public function render(): mixed
    {
        return view('core::livewire.pages.settings.contact-settings-page')
            ->layout(AppLayouts::class, [
                'pageTitle'   => __('General Settings'),
                'breadcrumbs' => [
                    route('dashboard.home')             => __('Home'),
                    route('dashboard.settings.general') => __('General Settings'),
                ],
            ]);
    }
}
