<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Custom\VerificationCode\Enums;

enum VerificationCodePurpose: string
{
    case Login = 'Login';
    case ResetPassword = 'ResetPassword';
}
