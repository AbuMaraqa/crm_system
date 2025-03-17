<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/23/24, 9:35 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Shop\Facades;

use Illuminate\Support\Facades\Facade;
use Modules\Shop\Entities\ProductCategory;
use Modules\Shop\Repositories\ProductCategoryRepository;

/**
 * @method static getProductCategoriesOptions(bool $withoutParent = false)
 * @method static renderIsFeatured(ProductCategory $productCategory): string
 * @method static getProductCategoriesTree(): array
 */
class ProductCategoryHelper extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return ProductCategoryRepository::class;
    }
}
