<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/24/24, 7:12 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Shop\Livewire\Widgets;

use Filament\Widgets\Widget;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Lazy;
use Modules\Shop\Entities\Tag;
use Modules\Shop\Entities\ProductCategory;
use Modules\Shop\Enums\ProductStatus;

#[Lazy]
class ShopStatsOverview extends Widget
{

    private function getProductsCount(): array
    {
        $totalProducts = Tag::where('status', ProductStatus::Published)->count();

        return [
            'link'              => route('dashboard.shop.products'),
            'title'             => __('Published Products'),
            'value'             => number_format($totalProducts),
            'icon'              => 'iconsax-bul-box',
            'icon_parent_class' => 'bg-[#eff6ff]',
            'icon_class'        => 'text-[#3b82f6]',
            'shapes_class'      => 'bg-[#3b82f6] shadow-[#3b82f6]/10',
            'visible'           => auth()->user()->can('dashboard.shop.products'),
        ];
    }

    private function getProductCategoriesCount(): array
    {
        $totalProducts = ProductCategory::where('status', ProductStatus::Published)->count();

        return [
            'link'              => route('dashboard.shop.product_categories'),
            'title'             => __('Published Tag Categories'),
            'value'             => number_format($totalProducts),
            'icon'              => 'iconsax-bul-data-2',
            'icon_parent_class' => 'bg-[#fef2f2]',
            'icon_class'        => 'text-[#ef4444]',
            'shapes_class'      => 'bg-[#ef4444] shadow-[#ef4444]/10',
            'visible'           => auth()->user()->can('dashboard.shop.product_categories'),
        ];
    }


    /**
     * @return array[]
     */
    private function prepareData(): array
    {
        return [
            $this->getProductsCount(),
            $this->getProductCategoriesCount(),
        ];
    }


    /**
     * @return View
     */
    public function render(): View
    {
        return view('shop::livewire.widgets.shop-state-overview', [
            'widgets' => $this->prepareData(),
        ]);
    }
}
