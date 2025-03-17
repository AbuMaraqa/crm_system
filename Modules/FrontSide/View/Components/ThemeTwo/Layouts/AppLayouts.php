<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/24/24, 7:19 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\FrontSide\View\Components\ThemeTwo\Layouts;

use Illuminate\View\Component;
use Illuminate\View\View;
use Modules\Core\Entities\Setting;
use Modules\Core\Services\Settings\ApplicationSettings;
use Modules\Shop\Entities\Tag;

class AppLayouts extends Component
{
    public string $favIcons;
    public $logo;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->favIcons = Setting::renderFavicon();
    }

    /**
     * Get the view/contents that represent the component.
     */
    public function render(): View|string
    {
        $isSuperAdmin                      = auth()->check() && auth()->user()->id == 1;


        if (!Tag::count() && auth()->check() && !$isSuperAdmin) {
            $applicationSettings      = app(ApplicationSettings::class);
            $maintenanceModeStartDate = $applicationSettings->getValue('maintenance_mode_start_date');
            $maintenanceModeEndDate   = $applicationSettings->getValue('maintenance_mode_end_date');

            $logoUrl = $applicationSettings->getUrl('ltr_dark_site_logo', 'website-logo', 'logo-lg');

            if (app()->getLocale() == 'ar') {
                $logoUrl = $applicationSettings->getUrl('rtl_dark_site_logo', 'website-logo', 'logo-lg');
            }

            return view('maintenance.index', [
                'logoUrl'                  => $logoUrl,
                'maintenanceModeStartDate' => $maintenanceModeStartDate,
                'maintenanceModeEndDate'   => $maintenanceModeEndDate,
            ]);

        }

        return view('frontside::components.theme-two.layouts.app-layouts');
    }
}
