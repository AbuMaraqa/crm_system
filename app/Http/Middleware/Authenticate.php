<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\Routing\Exception\RouteNotFoundException;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if (! $request->expectsJson()) {
            try {

                if (strpos($request->route()->getName(), config('project.dashboard_prefix')) !== false) {
                    return route('dashboard.login');
                }

                return route('frontSide.login');
            } catch (RouteNotFoundException $th) {
                Log::error($th->getMessage());

                return url('/');
            }
        }

        return null;
    }
}
