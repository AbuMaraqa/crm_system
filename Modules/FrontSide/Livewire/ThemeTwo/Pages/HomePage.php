<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/24/24, 6:40 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\FrontSide\Livewire\ThemeTwo\Pages;

use Filament\Forms\Components\Builder;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Modules\FrontSide\View\Components\ThemeTwo\Layouts\AppLayouts;
use Modules\Shop\Entities\Banner;
use Modules\Shop\Entities\Brand;
use Modules\Shop\Entities\Tag;
use Modules\Shop\Entities\ProductCategory;
use Modules\Shop\Enums\BannersStatus;
use Modules\Shop\Enums\ProductCategoryStatus;
use Modules\Shop\Enums\ProductStatus;

class HomePage extends Component
{
    public $selectedTab = 1;
    public $categorieFilterTab = 1;
    public $categoryID;

    public function selectTab($tabIndex)
    {
        $this->selectedTab = $tabIndex;
    }

    public function selectCategory($categoryId)
    {
        $this->categoryID = $categoryId;
        $this->categorieFilterTab = $categoryId;
        $this->newArriavalProducts();
}

    #[Computed]
    public function categories()
    {
        return ProductCategory::query()
            ->where('status', ProductCategoryStatus::Published)
            ->get();
    }

    #[Computed]
    public function getAboveNewFeatureBanner(){
        return Banner::query()
            ->where('type', BannersStatus::ABOVE_NEW_FEATURE)
            ->first();
    }

    #[Computed]
    public function onClickTitle(){
        $this->title = 'Mohamad Maraqa Pro';
    }

    public function test()
    {
        return dd('asd');
    }

    #[Computed]
    public function mainSlider()
    {
        return Banner::query()
            ->where('type', BannersStatus::MAIN_BANNERS)
            ->inRandomOrder()
            ->limit(5)
            ->get();
    }
    #[Computed]
    public function newArriavalProducts()
    {
        $categoryID = $this->categoryID;

        $query = Tag::query()
            ->with(['categories'])
            ->orderBy('created_at', 'desc')
            ->inRandomOrder()
            ->limit(8);

        if ($categoryID !== null) {
            $query->whereHas('categories', function ($query) use ($categoryID) {
                $query->where('product_category_id', $categoryID);
            });
        }

        return $query->get();
    }

    #[Computed]
    public function newArriavalBanners()
    {
        return Banner::query()
            ->where('type', BannersStatus::UNDER_FEATURE_PRODUCT)
            ->orderBy('created_at', 'desc')
            ->limit(2)
            ->get();
    }

    #[Computed]
    public function underNewArraivalBanners()
    {
        return Banner::where('type', BannersStatus::UNDER_NEW_ARRAIVALS)->limit(4)->get();
    }

    #[Computed]
    public function featuredProducts()
    {
        return Tag::query()
            ->where('status', ProductStatus::Published)
            // ->where('is_featured', true)
            ->whereDate('created_at', '>=', now()->subDays(30))
            ->inRandomOrder()
            ->limit(4)
            ->get();
    }

    #[Computed]
    public function topProducts()
    {
        return Tag::query()
            ->where('status', ProductStatus::Published)
            // ->where('is_top', true)
            ->inRandomOrder()
            ->limit(4)
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

    #[Computed]
    public function getCategoriesFilter()
    {
        return ProductCategory::query()
            ->where('status', ProductCategoryStatus::Published)
            ->limit(4)
            ->get();
    }

    #[Computed]
    public function getBrands()
    {
        return Brand::query()
            ->inRandomOrder()
            ->limit(6)
            ->get();
    }

    public function render()
    {
        return view('frontside::livewire.theme-two.pages.home-page')->layout(AppLayouts::class, ['pageTitle' => __('Home Page')]);
    }
}
