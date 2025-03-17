<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Custom\Auth\Password\Contracts;

use Closure;
use Modules\Core\Custom\Auth\Password\Enums\PasswordResetStatus;

interface ResetPasswordContract
{
    /**
     * Send a password reset email to a user.
     *
     * @return string
     */
    public function sendResetEmail(array $credentials, ?Closure $callback = null): PasswordResetStatus;

    /**
     * Reset the password for the given code.
     */
    public function reset(array $credentials, Closure $callback): PasswordResetStatus;
}
