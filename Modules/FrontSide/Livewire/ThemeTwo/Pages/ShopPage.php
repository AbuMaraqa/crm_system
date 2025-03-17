<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/23/24, 9:35 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\FrontSide\Livewire\ThemeTwo\Pages;

use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\FrontSide\View\Components\ThemeTwo\Layouts\AppLayouts;
use Modules\Shop\Entities\Tag;
use Modules\Shop\Entities\TagTranslation;
use Modules\Shop\Enums\ProductStatus;

class ShopPage extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $searchTerm = '';

    #[Computed]
    public function mount()
    {
        $this->searchTerm = request()->query('search', '');
    }

    #[Computed]
    public function products()
    {
        $query = Tag::query()
            ->where('status', ProductStatus::Published);

        if ($this->searchTerm) {
            $query->whereHas('translations', function($query) {
                $query->where('title', 'like', '%' . $this->searchTerm . '%');
            });
        }

        return $query->paginate(10);
    }

    /**
     * @return mixed
     */
    public function render(): mixed
    {
        $products = TagTranslation::query()
        ->where('title', 'like', '%' . $this->searchTerm . '%')
        ->limit(9)
        ->get();

        return view('frontside::livewire.theme-two.pages.shop-page')->layout(AppLayouts::class, ['pageTitle' => __('Shop Page')]);
    }
}
