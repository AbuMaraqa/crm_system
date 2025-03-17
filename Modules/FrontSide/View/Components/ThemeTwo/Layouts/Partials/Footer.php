<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\FrontSide\View\Components\ThemeTwo\Layouts\Partials;

use Illuminate\View\Component;
use Illuminate\View\View;
use Modules\Core\Services\Settings\ApplicationSettings;
use Modules\Shop\Entities\ProductCategory;
use Modules\Shop\Enums\ProductCategoryStatus;
use Livewire\Attributes\Computed;

class Footer extends Component
{
    /**
     * @var mixed|null
     */
    public mixed $logoUrl;
    public $categories ;
    public $description ;
    public $phone ;
    public $email ;
    public $whats_app ;
    public $facebook ;
    public $twitter ;
    public $instgram ;
    public $linked_in ;
    public $tiktok ;
    public $telegram ;
    public $address ;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $applicationSettings = app(ApplicationSettings::class);
        $this->logoUrl       = $applicationSettings->getUrl('ltr_light_site_logo', 'website-logo', 'logo-lg');

        if (app()->getLocale() == 'ar') {
            $this->logoUrl = $applicationSettings->getUrl('rtl_light_site_logo', 'website-logo', 'logo-lg');
        }

        $this->categories = $this->getCategoriesFooter();
        $this->description = $applicationSettings->getValue('description');
        $this->phone = $applicationSettings->getValue('phone');
        $this->email = $applicationSettings->getValue('email');
        $this->whats_app = $applicationSettings->getValue('whats_app');
        $this->facebook = $applicationSettings->getValue('facebook');
        $this->twitter = $applicationSettings->getValue('twitter');
        $this->instgram = $applicationSettings->getValue('instgram');
        $this->linked_in = $applicationSettings->getValue('linked_in');
        $this->tiktok = $applicationSettings->getValue('tiktok');
        $this->telegram = $applicationSettings->getValue('telegram');
        $this->address = $applicationSettings->getValue('address');
    }

    public function getCategoriesFooter(){
        return ProductCategory::query()
            ->where('status', ProductCategoryStatus::Published)
            ->inRandomOrder()
            ->limit(6)
            ->get();
    }


    /**
     * Get the view/contents that represent the component.
     */
    public function render(): View|string
    {
        return view('frontside::components.theme-two.layouts.partials.footer');
    }
}
