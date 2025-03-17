<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Custom\Auth\Password\PasswordResetMethods;

use Closure;
use Illuminate\Support\Facades\Password;
use Modules\Core\Custom\Auth\Password\Contracts\ResetPasswordContract;
use Modules\Core\Custom\Auth\Password\Enums\PasswordResetStatus;

class ResetByLink implements ResetPasswordContract
{
    public function sendResetEmail(array $credentials, ?Closure $callback = null): PasswordResetStatus
    {
        return PasswordResetStatus::tryFrom(Password::sendResetLink($credentials, $callback));
    }

    /**
     * Reset the password for the given code.
     *
     * @return mixed
     */
    public function reset(array $credentials, Closure $callback): PasswordResetStatus
    {
        $value = Password::reset($credentials, $callback);

        return PasswordResetStatus::tryFrom($value);
    }
}
