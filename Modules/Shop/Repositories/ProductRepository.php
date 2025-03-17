<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/23/24, 9:35 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Shop\Repositories;

use Modules\Shop\Entities\ProductCategory;

class ProductRepository
{

    /**
     * @param $property
     *
     * @return string
     */
    public function renderProperty($property): string
    {
        $label = $property ? __('Yes') : __('No');
        $color = $property ? 'info' : 'error';

        return <<<LABEL
                <div class="badge space-x-2.5 rounded-full bg-$color/10 text-$color dark:bg-$color/15">
                  <div class="size-2 rounded-full bg-current"></div>
                  <span>{$label}</span>
                </div>
            LABEL;
    }



    /**
     * @param $categories
     * @param $parentId
     * @param string $prefix
     *
     * @return array
     */
    public function buildCategoryTreeAsOptions($categories = null, $parentId = null, string $prefix = ''): array
    {
        $branch = [];

        if (is_null($categories)) {
            $categories = ProductCategory::query()->get();
        }

        foreach ($categories as $category) {
            if ($category->parent_id == $parentId) {
                $children = $this->buildCategoryTreeAsOptions($categories, $category->id, $prefix . '---');
                $branch[] = [
                    'value' => $category->id,
                    'label' => $prefix . $category->getTitle(),
                    'children' => $children,
                ];
            }
        }

        return $branch;
    }
}
