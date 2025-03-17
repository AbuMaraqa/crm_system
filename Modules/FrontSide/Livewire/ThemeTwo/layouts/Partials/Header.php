<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/
namespace Modules\FrontSide\Livewire\ThemeTwo\layouts\Partials;

use Illuminate\Support\Facades\Request;
use Livewire\Component;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Modules\Core\Services\Settings\ApplicationSettings;
use Modules\Shop\Entities\Tag;
use Modules\Shop\Entities\ProductCategory;
use Modules\Shop\Entities\ProductTag;
use Modules\Shop\Entities\TagTranslation;

class Header extends Component
{
    /**
     * @var mixed|null
     */
    public mixed $logoUrl;
    public $categories;
    public $products = [];
    public $searchProductInput = '';

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $applicationSettings = app(ApplicationSettings::class);
        $this->logoUrl       = $applicationSettings->getUrl('ltr_light_site_logo', 'website-logo', 'logo-lg');

        if (app()->getLocale() == 'ar') {
            $this->logoUrl = $applicationSettings->getUrl('rtl_dark_site_logo', 'website-logo', 'logo-lg');
        }

        $this->categories = ProductCategory::limit(8)->get();

        $this->products = Tag::limit(9)->get();
    }

    public function searchProduct(){
        return redirect()->route('frontside.shop', ['search' => $this->searchProductInput]);
    }

    public function selectCategory($categoryID)
    {
        $query = Tag::query()->with(['categories']);
        if ($categoryID) {
            $query->whereHas('categories', function ($query) use ($categoryID) {
                $query->where('product_category_id', $categoryID);
            });
        }
        $this->products = $query->limit(9)->get();
    }

    /**
     * Get the view/contents that represent the component.
     */
    public function render(): View|string
    {
        return view('frontside::livewire.theme-two.layouts.partials.header');
    }
}
