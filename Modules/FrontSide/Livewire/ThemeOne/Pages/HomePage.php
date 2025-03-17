<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/24/24, 6:40 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\FrontSide\Livewire\ThemeOne\Pages;

use Livewire\Attributes\Computed;
use Livewire\Component;
use Modules\FrontSide\View\Components\ThemeOne\Layouts\AppLayouts;
use Modules\Shop\Entities\Tag;
use Modules\Shop\Entities\ProductCategory;
use Modules\Shop\Enums\ProductCategoryStatus;
use Modules\Shop\Enums\ProductStatus;

class HomePage extends Component
{
    #[Computed]
    public function categories()
    {
        return ProductCategory::query()
            ->where('status', ProductCategoryStatus::Published)
            ->get();
    }

    #[Computed]
    public function mainSlider()
    {
        return Tag::query()
            ->where('status', ProductStatus::Published)
            ->inRandomOrder()
            ->limit(5)
            ->get();
    }
    #[Computed]
    public function newArriavalProducts()
    {
        return Tag::query()
            ->where('status', ProductStatus::Published)
            ->orderBy('created_at', 'desc')
            ->limit(12)
            ->get();
    }

    #[Computed]
    public function featuredProducts()
    {
        return Tag::query()
            ->where('status', ProductStatus::Published)
            ->where('is_featured', true)
            ->inRandomOrder()
            ->limit(4)
            ->get();
    }

    #[Computed]
    public function topProducts()
    {
        return Tag::query()
            ->where('status', ProductStatus::Published)
            ->where('is_top', true)
            ->inRandomOrder()
            ->limit(16)
            ->get();
    }

    #[Computed]
    public function bestSellerProducts()
    {
        return Tag::query()
            ->where('status', ProductStatus::Published)
            ->where(function ($query) {
                $query->where('is_best_seller', true)
                    ->orWhere('is_top', true);
            })
            ->inRandomOrder()
            ->limit(12)
            ->get();
    }

    public function render()
    {
        return view('frontside::livewire.theme-one.pages.home-page')->layout(AppLayouts::class, ['pageTitle' => __('Home Page')]);
    }
}
