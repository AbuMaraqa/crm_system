<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/23/24, 9:35 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\FrontSide\Livewire\ThemeOne\Pages;

use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Modules\FrontSide\View\Components\ThemeOne\Layouts\AppLayouts;
use Modules\Shop\Entities\ProductCategory;
use Modules\Shop\Enums\ProductCategoryStatus;

class CategoriesPage extends Component implements HasForms
{
    use InteractsWithForms;

    #[Computed]
    public function categories()
    {
        return ProductCategory::query()
            ->where('status', ProductCategoryStatus::Published)
            ->get();
    }

    public function render()
    {
        return view('frontside::livewire.theme-one.pages.categories-page')->layout(AppLayouts::class, ['pageTitle' => __('Categories')]);
    }
}
