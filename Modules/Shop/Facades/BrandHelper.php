<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 7/17/24, 7:03 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Shop\Facades;

use Illuminate\Support\Facades\Facade;
use Modules\Shop\Entities\Brand;
use Modules\Shop\Repositories\BrandRepository;

/**
 * @method static renderIsFeatured(Brand $brand): string
 */
class BrandHelper extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return BrandRepository::class;
    }
}
