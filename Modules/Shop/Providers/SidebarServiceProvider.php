<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/2/24, 9:34 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Shop\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Services\Sidebar\Sidebar;
use Modules\Core\Services\Sidebar\SidebarGroup;
use Modules\Core\Services\Sidebar\SidebarItem;

class SidebarServiceProvider extends ServiceProvider
{
    public function register()
    {

    }

    public function boot(Sidebar $sidebar)
    {
        $brandGroup = new SidebarGroup(2, ['dashboard.shop.brands','dashboard.shop.brands.create'], 'Brands', 'iconsax-bul-copyright');
        $brandGroup->addItem(new SidebarItem(1, ['dashboard.shop.brands'], 'List Brands', 'dashboard.shop.brands', 'iconsax-bul-copyright'));
        $brandGroup->addItem(new SidebarItem(2, ['dashboard.shop.brands.create'], 'Create Brand', 'dashboard.shop.brands.create', 'iconsax-bul-add'));

        $productLabelsGroup = new SidebarGroup(3, ['dashboard.shop.product_labels'], 'Tag Labels', 'iconsax-bul-bookmark-2');
        $productLabelsGroup->addItem(new SidebarItem(1, ['dashboard.shop.product_labels'], 'List Tag Labels', 'dashboard.shop.product_labels', 'iconsax-bul-bookmark-2'));

        $productTagsGroup = new SidebarGroup(4, ['dashboard.shop.product_tags'], 'Tag Tags', 'iconsax-bul-tag-2');
        $productTagsGroup->addItem(new SidebarItem(1, ['dashboard.shop.product_tags'], 'List Tag Tags', 'dashboard.shop.product_tags', 'iconsax-bul-tag-2'));

        $productAttributeSetsGroup = new SidebarGroup(5, ['dashboard.shop.product_attribute_sets','dashboard.shop.product_attribute_sets.create'], 'Tag Attributes', 'iconsax-bul-bookmark');
        $productAttributeSetsGroup->addItem(new SidebarItem(1, ['dashboard.shop.product_attribute_sets'], 'List Tag Attributes', 'dashboard.shop.product_attribute_sets', 'iconsax-bul-bookmark'));
        $productAttributeSetsGroup->addItem(new SidebarItem(2, ['dashboard.shop.product_attribute_sets.create'], 'Create Tag Attribute', 'dashboard.shop.product_attribute_sets.create', 'iconsax-bul-element-plus'));

        $productCategoriesGroup = new SidebarGroup(7, ['dashboard.shop.product_categories','dashboard.shop.product_categories.create'], 'Tag Categories', 'iconsax-bul-data-2');
        $productCategoriesGroup->addItem(new SidebarItem(1, ['dashboard.shop.product_categories'], 'List Categories', 'dashboard.shop.product_categories', 'iconsax-bul-category'));
        $productCategoriesGroup->addItem(new SidebarItem(2, ['dashboard.shop.product_categories.create'], 'Create Category', 'dashboard.shop.product_categories.create', 'iconsax-bul-element-plus'));

        $bannersGroup = new SidebarGroup(6, ['dashboard.shop.banners','dashboard.shop.banners.create'], 'Banners', 'iconsax-bul-image');
        $bannersGroup->addItem(new SidebarItem(1, ['dashboard.shop.banners'], 'List Banners', 'dashboard.shop.banners', 'iconsax-bul-image'));
        $bannersGroup->addItem(new SidebarItem(2, ['dashboard.shop.banners.create'], 'Create Banner', 'dashboard.shop.banners.create', 'iconsax-bul-image'));

        $productsGroup = new SidebarGroup(8, ['dashboard.shop.products','dashboard.shop.products.create'], 'Products', 'iconsax-bul-box');
        $productsGroup->addItem(new SidebarItem(1, ['dashboard.shop.products'], 'List Products', 'dashboard.shop.products', 'iconsax-bul-box-1'));
        $productsGroup->addItem(new SidebarItem(2, ['dashboard.shop.products.create'], 'Create Tag', 'dashboard.shop.products.create', 'iconsax-bul-box-add'));

        $pagesGroup = new SidebarGroup(8, ['dashboard.shop.pages','dashboard.shop.pages.create'], 'Pages', 'iconsax-bul-box');
        $pagesGroup->addItem(new SidebarItem(1, ['dashboard.shop.pages'], 'List Pages', 'dashboard.shop.pages', 'iconsax-bul-box-1'));
        $pagesGroup->addItem(new SidebarItem(2, ['dashboard.shop.pages.create'], 'Create Page', 'dashboard.shop.pages.create', 'iconsax-bul-box-add'));


        $sidebar->addItem($brandGroup);
        $sidebar->addItem($productLabelsGroup);
        $sidebar->addItem($productTagsGroup);
//        $sidebar->addItem($productAttributeSetsGroup);
        $sidebar->addItem($productCategoriesGroup);
        $sidebar->addItem($productsGroup);
        $sidebar->addItem($bannersGroup);
        $sidebar->addItem($pagesGroup);

    }
}
