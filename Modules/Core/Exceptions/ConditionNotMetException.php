<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Exceptions;

use Symfony\Component\HttpKernel\Exception\HttpException;

class ConditionNotMetException extends HttpException
{
    public function __construct(string $message = '', int $statusCode = 422, ?\Throwable $previous = null, array $headers = [], int $code = 0)
    {
        parent::__construct($statusCode, $message, $previous, $headers, $code);
    }
}
