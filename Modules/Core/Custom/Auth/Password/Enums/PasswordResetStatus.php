<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Custom\Auth\Password\Enums;

enum PasswordResetStatus: string
{
    case RESET_LINK_SENT = 'passwords.sent';
    case RESET_THROTTLED = 'passwords.throttled';
    case PASSWORD_RESET = 'passwords.reset';

    case INVALID_USER = 'passwords.user';
    case INVALID_TOKEN = 'passwords.token';
}
