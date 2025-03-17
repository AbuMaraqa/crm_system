<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Custom\Auth\Password;

use Closure;
use Modules\Core\Custom\Auth\Password\Enums\PasswordResetMethod;
use Modules\Core\Custom\Auth\Password\Enums\PasswordResetStatus;

class Password
{
    public function sendResetEmail(
        array $credentials,
        ?Closure $callback = null,
        PasswordResetMethod $method = PasswordResetMethod::RestLink,
    ): PasswordResetStatus {
        $methodObject = new ($method->getMethodClass())();

        return $methodObject->sendResetEmail($credentials, $callback);
    }

    /**
     * Reset the password for the given code.
     *
     * @return mixed
     */
    public function reset(
        array $credentials,
        Closure $callback,
        PasswordResetMethod $method = PasswordResetMethod::RestLink
    ): PasswordResetStatus {
        $methodObject = new ($method->getMethodClass())();

        return $methodObject->reset($credentials, $callback);
    }
}
