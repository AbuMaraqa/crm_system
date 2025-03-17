<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/23/24, 9:35 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\FrontSide\Livewire\ThemeOne\Pages;

use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\FrontSide\View\Components\ThemeOne\Layouts\AppLayouts;
use Modules\Shop\Entities\Tag;
use Modules\Shop\Enums\ProductStatus;

class ShopPage extends Component
{
    use WithPagination;


    #[Computed]
    public function products()
    {
        return Tag::query()
            ->where('status', ProductStatus::Published)
            ->paginate(56);
    }

    /**
     * @return mixed
     */
    public function render(): mixed
    {
        return view('frontside::livewire.theme-one.pages.shop-page')->layout(AppLayouts::class, ['pageTitle' => __('Shop Page')]);
    }
}
