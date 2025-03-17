<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/23/24, 9:35 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Livewire\Pages\Settings;

use Filament\Forms\Components\FileUpload;
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

class GeneralSettingsPage extends Component implements HasForms, HasInfolists
{
    use HasFormControlButtons;
    use InteractsWithForms;
    use InteractsWithInfolists;

    public array $data = [];

    public function mount(ApplicationSettings $applicationSettings)
    {
        $this->form->fill([
            'app_name'            => $applicationSettings->getValue('app_name'),
            'description'            => $applicationSettings->getValue('description'),
        ]);
    }

    public function generalSettingsInfolist(Infolist $infolist): Infolist
    {
        $applicationSettings = app(ApplicationSettings::class);
        $ltrLightSiteLogoUrl = $applicationSettings->getUrl('ltr_light_site_logo', 'website-logo', 'logo-lg');
        $ltrDarkSiteLogoUrl  = $applicationSettings->getUrl('ltr_dark_site_logo', 'website-logo', 'logo-lg');
        $rtlLightSiteLogoUrl = $applicationSettings->getUrl('rtl_light_site_logo', 'website-logo', 'logo-lg');
        $rtlDarkSiteLogoUrl  = $applicationSettings->getUrl('rtl_dark_site_logo', 'website-logo', 'logo-lg');
        $faviconUrl          = $applicationSettings->getUrl('website_favicon', 'website-favicons', 'apple-icon-180x180');

        return $infolist
            ->state([
                'app_name'                => $applicationSettings->getValue('app_name'),
                'ltr_light_site_logo_url' => $ltrLightSiteLogoUrl,
                'ltr_dark_site_logo_url'  => $ltrDarkSiteLogoUrl,
                'rtl_light_site_logo_url' => $rtlLightSiteLogoUrl,
                'rtl_dark_site_logo_url'  => $rtlDarkSiteLogoUrl,
                'favicon_url'             => $faviconUrl,
                'description'             => $applicationSettings->getValue('description')
            ])
            ->schema([
                ComponentsSection::make(__('Settings Overview'))
                    ->schema([
                        TextEntry::make('app_name')
                            ->label(__('App Name'))
                            ->columnSpan(12),

                        ImageEntry::make('ltr_light_site_logo_url')
                            ->label(__('LTR Light Site Logo'))
                            ->height(80)
                            ->columnSpan(3),

                        ImageEntry::make('ltr_dark_site_logo_url')
                            ->label(__('LTR Dark Site Logo'))
                            ->height(80)
                            ->columnSpan(3),

                        ImageEntry::make('rtl_light_site_logo_url')
                            ->label(__('RTL Light Site Logo'))
                            ->height(80)
                            ->columnSpan(3),

                        ImageEntry::make('rtl_dark_site_logo_url')
                            ->label(__('RTL Dark Site Logo'))
                            ->height(80)
                            ->columnSpan(3),

                        ImageEntry::make('favicon_url')
                            ->label(__('Favicon'))
                            ->height(80)
                            ->columnSpan(12),
                    ])
                    ->columnSpan([
                        'default' => 12,
                        'xl'      => 4,
                    ]),
            ]);
    }

    public function form(Form $form): Form
    {
        return $form
    ->schema([
        Section::make(__('Settings'))
            ->icon('heroicon-s-computer-desktop')
            ->iconColor('primary')
            ->columns()
            ->schema([

                TextInput::make('app_name')
                    ->label(__('App Name'))
                    ->columnSpanFull()
                    ->required()
                    ->string()
                    ->maxLength(255),
                RichEditor::make('description')
                    ->label(__('Description'))
                    ->columnSpanFull()
                    ->nullable(),

                FileUpload::make('ltr_light_site_logo')
                    ->label(__('LTR Light Site Logo'))
                    ->image()
                    ->storeFiles(false)
                    ->imageEditor(),

                FileUpload::make('rtl_light_site_logo')
                    ->label(__('RTL Light Site Logo'))
                    ->image()
                    ->storeFiles(false)
                    ->imageEditor(),

                FileUpload::make('ltr_dark_site_logo')
                    ->label(__('LTR Dark Site Logo'))
                    ->image()
                    ->storeFiles(false)
                    ->imageEditor(),

                FileUpload::make('rtl_dark_site_logo')
                    ->label(__('RTL Dark Site Logo'))
                    ->image()
                    ->storeFiles(false)
                    ->imageEditor(),

                FileUpload::make('favicon')
                    ->label(__('Favicon'))
                    ->image()
                    ->storeFiles(false)
                    ->imageEditor()
                    ->columnSpanFull()
            ]),
    ])
    ->statePath('data');
    }

    /**
     * @return void
     */
    protected function redirectToIntendedRoute(): void
    {
        $this->redirectRoute('dashboard.settings.general');
    }

    /**
     * @return void
     * @throws AuthorizationException
     * @throws ValidationException
     */
    public function saving(): void
    {
        $applicationSettings = app(ApplicationSettings::class);
        $this->authorize('dashboard.settings.general');

        $this->validate();

        $data = $this->form->getState();

        if ($data['ltr_light_site_logo']) {
            $applicationSettings->set('ltr_light_site_logo', 'LTR Light Site Logo')
                ->addWebsiteLogo($data['ltr_light_site_logo']->getRealPath());
        }
        if ($data['ltr_dark_site_logo']) {
            $applicationSettings->set('ltr_dark_site_logo', 'LTR Dark Site Logo')
                ->addWebsiteLogo($data['ltr_dark_site_logo']->getRealPath());
        }
        if ($data['rtl_light_site_logo']) {
            $applicationSettings->set('rtl_light_site_logo', 'RTL Light Site Logo')
                ->addWebsiteLogo($data['rtl_light_site_logo']->getRealPath());
        }
        if ($data['rtl_dark_site_logo']) {
            $applicationSettings->set('rtl_dark_site_logo', 'RTL Dark Site Logo')
                ->addWebsiteLogo($data['rtl_dark_site_logo']->getRealPath());
        }

        if ($data['favicon']) {
            $applicationSettings->set('website_favicon', 'Website Favicon')
                ->addWebsiteFavicon($data['favicon']->getRealPath());
        }

        $applicationSettings->set('app_name', $data['app_name']);
        $applicationSettings->set('description' , $data['description']);

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
        return view('core::livewire.pages.settings.general-settings-page')
            ->layout(AppLayouts::class, [
                'pageTitle'   => __('General Settings'),
                'breadcrumbs' => [
                    route('dashboard.home')             => __('Home'),
                    route('dashboard.settings.general') => __('General Settings'),
                ],
            ]);
    }
}
