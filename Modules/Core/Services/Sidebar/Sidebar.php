<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/2/24, 9:34 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Services\Sidebar;

use Illuminate\Support\Collection;
use Livewire\Livewire;

class Sidebar
{
    public string $id;

    public Collection $items;

    public function __construct(string $id)
    {
        $this->id    = $id;
        $this->items = collect();
    }

    public function addItem(SidebarSection|SidebarGroup|SidebarItem $item): self
    {
        if (!Livewire::isLivewireRequest()) {
            $this->items->push($item);
        }

        return $this;
    }

    public function getItems(): Collection
    {
        // return cache()->remember(app()->getLocale() . $this->id . session()->getId(), 3600, function () {

        return $this->items->sortBy('navigationSort')
            ->filter(function ($item) {

                $item->visible($item->isVisible());

                if ($item->isVisible()) {

                    if ($item instanceof SidebarGroup) {
                        $item->getItems();
                    }

                    if ($item instanceof SidebarSection) {
                        $item->getItems();
                    }

                    if ($item->isCentral && !tenant()) {
                        return true;
                    }
                    if (!$item->isCentral) {
                        return true;
                    }
                }

                return false;
            });
        // });
    }
}
