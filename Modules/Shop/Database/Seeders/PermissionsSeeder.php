<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/2/24, 9:34 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Shop\Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissionsNames = [
            // Shop Brand
            [
                'module' => 'Shop',
                'group'  => 'Brands',
                'label'  => 'View All Brands',
                'name'   => 'dashboard.shop.brands',
            ],
            [
                'module' => 'Shop',
                'group'  => 'Brands',
                'label'  => 'View Single Brand Details',
                'name'   => 'dashboard.shop.brands.view',
            ],
            [
                'module' => 'Shop',
                'group'  => 'Brands',
                'label'  => 'Create Brand',
                'name'   => 'dashboard.shop.brands.create',
            ],
            [
                'module' => 'Shop',
                'group'  => 'Brands',
                'label'  => 'Edit Brand',
                'name'   => 'dashboard.shop.brands.edit',
            ],
            [
                'module' => 'Shop',
                'group'  => 'Brands',
                'label'  => 'Delete Brand',
                'name'   => 'dashboard.shop.brands.delete',
            ],
            [
                'module' => 'Shop',
                'group'  => 'Brands',
                'label'  => 'Bulk Delete Brands',
                'name'   => 'dashboard.shop.brands.bulk_delete',
            ],
            [
                'module' => 'Shop',
                'group'  => 'Brands',
                'label'  => 'Restore Brand',
                'name'   => 'dashboard.shop.brands.restore',
            ],
            [
                'module' => 'Shop',
                'group'  => 'Brands',
                'label'  => 'Filter Deleted Brands',
                'name'   => 'dashboard.shop.brands.filters.trashed',
            ],


            // Shop Tag Label
            [
                'module' => 'Shop',
                'group'  => 'Tag Labels',
                'label'  => 'View All Tag Labels',
                'name'   => 'dashboard.shop.product_labels',
            ],
            [
                'module' => 'Shop',
                'group'  => 'Tag Labels',
                'label'  => 'View Single Tag Label Details',
                'name'   => 'dashboard.shop.product_labels.view',
            ],
            [
                'module' => 'Shop',
                'group'  => 'Tag Labels',
                'label'  => 'Create Tag Label',
                'name'   => 'dashboard.shop.product_labels.create',
            ],
            [
                'module' => 'Shop',
                'group'  => 'Tag Labels',
                'label'  => 'Edit Tag Label',
                'name'   => 'dashboard.shop.product_labels.edit',
            ],
            [
                'module' => 'Shop',
                'group'  => 'Tag Labels',
                'label'  => 'Delete Tag Label',
                'name'   => 'dashboard.shop.product_labels.delete',
            ],
            [
                'module' => 'Shop',
                'group'  => 'Tag Labels',
                'label'  => 'Bulk Delete Tag Labels',
                'name'   => 'dashboard.shop.product_labels.bulk_delete',
            ],
            [
                'module' => 'Shop',
                'group'  => 'Tag Labels',
                'label'  => 'Restore Tag Label',
                'name'   => 'dashboard.shop.product_labels.restore',
            ],
            [
                'module' => 'Shop',
                'group'  => 'Tag Labels',
                'label'  => 'Filter Deleted Tag Labels',
                'name'   => 'dashboard.shop.product_labels.filters.trashed',
            ],

            // Shop Tag Tags
            [
                'module' => 'Shop',
                'group'  => 'Tag Tags',
                'label'  => 'View All Tag Tags',
                'name'   => 'dashboard.shop.product_tags',
            ],
            [
                'module' => 'Shop',
                'group'  => 'Tag Tags',
                'label'  => 'View Single Tag Tag Details',
                'name'   => 'dashboard.shop.product_tags.view',
            ],
            [
                'module' => 'Shop',
                'group'  => 'Tag Tags',
                'label'  => 'Create Tag Tag',
                'name'   => 'dashboard.shop.product_tags.create',
            ],
            [
                'module' => 'Shop',
                'group'  => 'Tag Tags',
                'label'  => 'Edit Tag Tag',
                'name'   => 'dashboard.shop.product_tags.edit',
            ],
            [
                'module' => 'Shop',
                'group'  => 'Tag Tags',
                'label'  => 'Delete Tag Tag',
                'name'   => 'dashboard.shop.product_tags.delete',
            ],
            [
                'module' => 'Shop',
                'group'  => 'Tag Tags',
                'label'  => 'Bulk Delete Tag Tags',
                'name'   => 'dashboard.shop.product_tags.bulk_delete',
            ],
            [
                'module' => 'Shop',
                'group'  => 'Tag Tags',
                'label'  => 'Restore Tag Tag',
                'name'   => 'dashboard.shop.product_tags.restore',
            ],
            [
                'module' => 'Shop',
                'group'  => 'Tag Tags',
                'label'  => 'Filter Deleted Tag Tags',
                'name'   => 'dashboard.shop.product_tags.filters.trashed',
            ],





            // Shop Tag Categories
            [
                'module' => 'Shop',
                'group'  => 'Tag Categories',
                'label'  => 'View All Tag Categories',
                'name'   => 'dashboard.shop.product_categories',
            ],
            [
                'module' => 'Shop',
                'group'  => 'Tag Categories',
                'label'  => 'View Single Tag Category Details',
                'name'   => 'dashboard.shop.product_categories.view',
            ],
            [
                'module' => 'Shop',
                'group'  => 'Tag Categories',
                'label'  => 'Create Tag Category',
                'name'   => 'dashboard.shop.product_categories.create',
            ],
            [
                'module' => 'Shop',
                'group'  => 'Tag Categories',
                'label'  => 'Edit Tag Category',
                'name'   => 'dashboard.shop.product_categories.edit',
            ],
            [
                'module' => 'Shop',
                'group'  => 'Tag Categories',
                'label'  => 'Delete Tag Category',
                'name'   => 'dashboard.shop.product_categories.delete',
            ],
            [
                'module' => 'Shop',
                'group'  => 'Tag Categories',
                'label'  => 'Bulk Delete Tag Categories',
                'name'   => 'dashboard.shop.product_categories.bulk_delete',
            ],
            [
                'module' => 'Shop',
                'group'  => 'Tag Categories',
                'label'  => 'Restore Tag Category',
                'name'   => 'dashboard.shop.product_categories.restore',
            ],
            [
                'module' => 'Shop',
                'group'  => 'Tag Categories',
                'label'  => 'Filter Deleted Tag Categories',
                'name'   => 'dashboard.shop.product_categories.filters.trashed',
            ],


            // Shop Products
            [
                'module' => 'Shop',
                'group'  => 'Products',
                'label'  => 'View All Products',
                'name'   => 'dashboard.shop.products',
            ],
            [
                'module' => 'Shop',
                'group'  => 'Products',
                'label'  => 'View Single Tag Details',
                'name'   => 'dashboard.shop.products.view',
            ],
            [
                'module' => 'Shop',
                'group'  => 'Products',
                'label'  => 'Create Tag',
                'name'   => 'dashboard.shop.products.create',
            ],
            [
                'module' => 'Shop',
                'group'  => 'Products',
                'label'  => 'Edit Tag',
                'name'   => 'dashboard.shop.products.edit',
            ],
            [
                'module' => 'Shop',
                'group'  => 'Products',
                'label'  => 'Delete Tag',
                'name'   => 'dashboard.shop.products.delete',
            ],
            [
                'module' => 'Shop',
                'group'  => 'Products',
                'label'  => 'Bulk Delete Products',
                'name'   => 'dashboard.shop.products.bulk_delete',
            ],
            [
                'module' => 'Shop',
                'group'  => 'Products',
                'label'  => 'Restore Tag',
                'name'   => 'dashboard.shop.products.restore',
            ],
            [
                'module' => 'Shop',
                'group'  => 'Products',
                'label'  => 'Filter Deleted Products',
                'name'   => 'dashboard.shop.products.filters.trashed',
            ],
        ];

        $permissions = Permission::all();

        collect($permissionsNames)->each(function ($permission) use ($permissions) {
            $permissionModel = $permissions->where('name', $permission['name'])->first();

            if (isset($permission['new_name']) && $permission['new_name']) {
                if (!$permissionModel) {
                    $permissionModel = $permissions->where('name', $permission['new_name'])->first();
                }

                $permission['name'] = $permission['new_name'];
                unset($permission['new_name']);
            }

            if (isset($permission['delete']) && $permission['delete']) {
                $permissionModel?->delete();
            } else {

                if ($permissionModel) {

                    $permissionModel->update($permission);
                } else {
                    $permission = Permission::make($permission);
                    $permission->saveOrFail();
                }
            }
        });

    }
}
