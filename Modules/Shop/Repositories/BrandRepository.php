<?php

/*************************************************
 * Copyright (c) 2024.
 *
 * @Author : Shaker Awad <awadshaker74@gmail.com>
 * @Date   : 7/17/24, 7:05 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Shop\Repositories;

use Modules\Shop\Entities\Brand;

class BrandRepository
{

    /**
     * @param Brand $brand
     *
     * @return string
     */
    public function renderIsFeatured(Brand $brand): string
    {
        $label = $brand->is_featured ? __('Yes') : __('No');
        $color = $brand->is_featured ? 'info' : 'error';

        return <<<LABEL
                    <div class="badge space-x-2.5 rounded-full bg-$color/10 text-$color dark:bg-$color/15">
                      <div class="size-2 rounded-full bg-current"></div>
                      <span>{$label}</span>
                    </div>
                LABEL;
    }
}
