<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Services\Localization\Middleware;

use Closure;
use Illuminate\Http\Request;
use Modules\Core\Services\Localization\Localization;

class Localized
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if (request()->session()->has('locale')) {
            $locale = request()->session()->get('locale');

            if (! Localization::isLocaleExist($locale)) {
                $locale = Localization::getFallbackLocale();
            }
        } else {

            $locale = Localization::getFallbackLocale();
        }

        $request->session()->put('locale', $locale);

        app()->setLocale($locale);

        return $next($request);
    }
}
