<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class EnsureEmailIsVerified
{
    /**
     * Handle an incoming request.
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (
            // !$request->user() ||
            $request->user() instanceof MustVerifyEmail &&
                ! $request->user()->hasVerifiedEmail()
        ) {
            // dd(route($request->user()->getProfileRouteName()));
            return $request->expectsJson()
                ? abort(403, 'Your email address is not verified.')
                : redirect()->route($request->user()->getProfileRouteName());
            // Redirect::guest(URL::route($request->user()->getProfileRouteName()));
        }

        return $next($request);
    }
}
