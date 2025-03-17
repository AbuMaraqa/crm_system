<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/23/24, 9:35 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Shop\Facades;

use Illuminate\Support\Facades\Facade;
use Modules\Shop\Repositories\ProductLabelRepository;


/**
 * @method static getLabelsAsOptions()
 * @method static mohamad()
 */
class ProductLabelHelper extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return ProductLabelRepository::class;
    }
}
