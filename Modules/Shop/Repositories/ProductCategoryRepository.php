<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/23/24, 9:35 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Shop\Repositories;

use Modules\Shop\Entities\ProductCategory;

class ProductCategoryRepository
{

    /**
     * @param ProductCategory $productCategory
     *
     * @return string
     */
    public function renderIsFeatured(ProductCategory $productCategory): string
    {
        $label = $productCategory->is_featured ? __('Yes') : __('No');
        $color = $productCategory->is_featured ? 'info' : 'error';

        return <<<LABEL
                    <div class="badge space-x-2.5 rounded-full bg-$color/10 text-$color dark:bg-$color/15">
                      <div class="size-2 rounded-full bg-current"></div>
                      <span>{$label}</span>
                    </div>
                LABEL;
    }


    /**
     * @param bool $withoutParent
     *
     * @return array
     */
    public function getProductCategoriesOptions(bool $withoutParent = false): array
    {
        $noParentOption = [
            0 => __('No Parent'),
        ];

        $categoryOptions = ProductCategory::get()->mapWithKeys(function ($category) {
            return [$category->id => $category->getTitle()];
        })->toArray();

        if ($withoutParent) {
            return $categoryOptions;
        }
        return $noParentOption + $categoryOptions;
    }


    /**
     * @return array
     */
    public function getProductCategoriesTree(): array
    {
        // Fetch all categories
        $categories = ProductCategory::all();

        // Create a map of categories by parent_id
        $categoriesByParent = $categories->groupBy('parent_id');

        // Recursively build the tree
        $buildTree = function($parentId = null) use (&$buildTree, $categoriesByParent) {
            // Get the categories for the current parent_id
            $children = $categoriesByParent->get($parentId, []);

            // Initialize the result array
            $result = [];

            // Iterate over the children
            foreach ($children as $child) {
                // Recursively build the tree for each child
                $result[] = [
                    'id' => $child->id,
                    'title' => $child->getTitle(),
                    'children' => $buildTree($child->id),
                ];
            }

            return $result;
        };

        // Build and return the tree starting from the root (parent_id = null or 0)
        return $buildTree(0);
    }


}
