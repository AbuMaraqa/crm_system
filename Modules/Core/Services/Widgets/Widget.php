<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Services\Widgets;

use Illuminate\Support\Collection;
use Livewire\Livewire;

class Widget
{
    public string $id;

    public Collection $items;

    protected string $defaultTabKey = '_default_tab';

    /**
     * @var WidgetTab[]
     */
    protected array $tabs = [];

    public function __construct(string $id)
    {
        $this->id = $id;
        $this->items = collect();
    }

    public function addItem(WidgetGroup|WidgetItem|WidgetTabs $item): self
    {
        if (! Livewire::isLivewireRequest()) {
            $this->items->push($item);
        }

        return $this;
    }

    public function getItems(): Collection
    {

        return cache()->remember(app()->getLocale().session()->getId().$this->id, 3600, function () {

            return $this->items->sortBy('widgetSort')
                ->filter(function ($item) {
                    $item->visible($item->isVisible());
                    if ($item->isVisible()) {

                        if ($item instanceof WidgetGroup) {
                            $item->items($item->getItems()->toArray());
                        }

                        if ($item instanceof WidgetTabs) {
                            $item->tabs($item->getChildComponents());
                        }

                        return true;
                    }

                    return false;
                });
        });

        // foreach ($this->items->sortBy('widgetSort') as $item) {
        //     if ($item->isVisible()) {
        //         yield $item;
        //     }
        // }
    }
}
