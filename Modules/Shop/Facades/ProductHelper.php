<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/23/24, 9:35 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Shop\Facades;

use Illuminate\Support\Facades\Facade;
use Modules\Shop\Repositories\ProductRepository;


/**
 * @method static buildCategoryTreeAsOptions($categories = null, $parentId = null, string $prefix = ''): array
 * @method static renderProperty($property): string
 */
class ProductHelper extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return ProductRepository::class;
    }
}
