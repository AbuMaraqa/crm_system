<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/23/24, 9:35 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\FrontSide\Livewire\ThemeTwo\Pages;

use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\FrontSide\View\Components\ThemeTwo\Layouts\AppLayouts;
use Modules\Shop\Entities\Tag;
use Modules\Shop\Entities\ProductCategory;
use Modules\Shop\Enums\ProductCategoryStatus;

class CategoriesPage extends Component implements HasForms
{
    use InteractsWithForms;
    use WithPagination;


    #[Computed]
    public function categories()
    {
        return ProductCategory::query()
            ->where('status', ProductCategoryStatus::Published)
            ->limit(8)
            ->get();
    }

    #[Computed]
    public function products()
    {
        return Tag::query()
            ->paginate(8);
    }

    public function render()
    {
        return view('frontside::livewire.theme-two.pages.categories-page')->layout(AppLayouts::class, ['pageTitle' => __('Categories')]);
    }
}
