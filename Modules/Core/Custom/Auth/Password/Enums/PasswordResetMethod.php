<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Custom\Auth\Password\Enums;

use Modules\Core\Custom\Auth\Password\PasswordResetMethods\ResetByLink;
use Modules\Core\Custom\Auth\Password\PasswordResetMethods\ResetByVerificationCode;

enum PasswordResetMethod: string
{
    case RestLink = 'RestLink';
    case VerificationCode = 'VerificationCode';

    public function getMethodClass(): string
    {
        return match ($this) {
            self::RestLink => ResetByLink::class,
            self::VerificationCode => ResetByVerificationCode::class,
        };
    }
}
