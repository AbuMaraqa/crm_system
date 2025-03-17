<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/24/24, 7:09 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\FrontSide\Livewire\ThemeTwo\Pages;

use Livewire\Attributes\Computed;
use Livewire\Component;
use Modules\FrontSide\View\Components\ThemeTwo\Layouts\AppLayouts;
use Modules\Shop\Entities\Tag;
use Modules\Shop\Enums\ProductStatus;

class ProductDetailsPage extends Component
{
    public string $productSlug;

    /**
     * @param string $slug
     *
     * @return void
     */
    public function mount(string $slug)
    {
        $this->productSlug = $slug;
    }

    #[Computed]
    public function product()
    {
        return Tag::with(['categories'])
            ->where('slug', $this->productSlug)
            ->first();
    }

    #[Computed]
    public function relatedProducts()
    {
        return $this->product->categories->flatMap(function ($category) {
            return $category->products()
                ->where('status', ProductStatus::Published)
                ->where('id', '!=', $this->product->id)
                ->limit(4)
                ->get();
        });
    }


    #[Computed]
    public function newProducts()
    {
        return Tag::query()
            ->where('status', ProductStatus::Published)
            ->where('created_at', '>=', now()->subDays(30))
            ->inRandomOrder()
            ->limit(7)
            ->get();
    }


    /**
     * @return mixed
     */
    public function render()
    {
        return view('frontside::livewire.theme-two.pages.product-details-page')->layout(AppLayouts::class);
    }
}
