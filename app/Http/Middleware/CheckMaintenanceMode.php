<?php

/*************************************************
 * Copyright (c) 2024.
 *
 * @Author : Shaker Awad <awadshaker74@gmail.com>
 * @Date   : 6/23/24, 9:50 AM.
 * @Project: Jumla
 ************************************************/

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Core\Services\Settings\ApplicationSettings;
use Symfony\Component\HttpFoundation\Response;

class CheckMaintenanceMode
{
    protected array $allowedIps = [
        '127.0.0.1',
        '24.42.69.250',
        '213.6.229.46',
        '213.6.142.9',
    ];

    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $applicationSettings               = app(ApplicationSettings::class);
        $isMaintenanceModeForWebsiteMode   = $applicationSettings->getValue('is_maintenance_mode_for_website');
        $isMaintenanceModeForDashboardMode = $applicationSettings->getValue('is_maintenance_mode_for_dashboard');
        $maintenanceModeStartDate          = $applicationSettings->getValue('maintenance_mode_start_date');
        $maintenanceModeEndDate            = $applicationSettings->getValue('maintenance_mode_end_date');
        $isSuperAdmin                      = auth()->check() && auth()->user()->id == 1;



        $isMaintenanceModeForWebsiteMode = $isMaintenanceModeForWebsiteMode
            && now()->between($maintenanceModeStartDate, $maintenanceModeEndDate)
            && !$isSuperAdmin
            && !in_array($request->ip(), $this->allowedIps)
            && str_starts_with(Route::currentRouteName(), 'frontside.');


        $isMaintenanceModeForDashboardMode = $isMaintenanceModeForDashboardMode
            && now()->between($maintenanceModeStartDate, $maintenanceModeEndDate)
            && !$isSuperAdmin
            && !in_array($request->ip(), $this->allowedIps)
            && str_starts_with(Route::currentRouteName(), 'dashboard.');

        $logoUrl = $applicationSettings->getUrl('ltr_dark_site_logo', 'website-logo', 'logo-lg');

        if (app()->getLocale() == 'ar') {
            $logoUrl = $applicationSettings->getUrl('rtl_dark_site_logo', 'website-logo', 'logo-lg');
        }


        if ($isMaintenanceModeForWebsiteMode || $isMaintenanceModeForDashboardMode) {
            return response()->view('maintenance.index', [
                'logoUrl'                  => $logoUrl,
                'maintenanceModeStartDate' => $maintenanceModeStartDate,
                'maintenanceModeEndDate'   => $maintenanceModeEndDate,
            ]);
        }


        return $next($request);
    }
}
