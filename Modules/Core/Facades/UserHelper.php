<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/2/24, 9:34 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Facades;

use Illuminate\Support\Facades\Facade;
use Modules\Core\Repositories\UserRepository;

/**
 * @method static renderStatusAsHtml($user)
 */
class UserHelper extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return UserRepository::class;
    }
}
