<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureUserAccountIsAllowed
{
    /**
     * Handle an incoming request.
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->user()->isAccountBlocked()) {

            return $request->expectsJson()
                ? abort(403, 'user account is blocked.')
                : redirect()->route($request->user()->getProfileRouteName());
        }

        return $next($request);
    }
}
