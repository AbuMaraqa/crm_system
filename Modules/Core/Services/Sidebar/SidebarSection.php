<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/2/24, 9:34 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Services\Sidebar;

use Filament\Support\Concerns\EvaluatesClosures;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Livewire\Livewire;
use Modules\Core\Traits\CanBeHidden;

class SidebarSection
{
    use CanBeHidden;
    use EvaluatesClosures;

    public int $navigationSort;

    public array $permissions;

    public Collection $items;

    public string $name;

    public ?string $icon;

    public bool $isCentral;

    public ?string $description;

    public function __construct(int $navigationSort, array $permissions, string $name, ?string $icon = null, bool $isCentral = false, ?string $description = null)
    {
        $this->items = collect();

        $this->navigationSort = $navigationSort;

        $this->permissions = $permissions;

        $this->name = $name;

        $this->icon = $icon;

        $this->isCentral = $isCentral;

        $this->description = $description;
    }

    public function addItem(SidebarGroup|SidebarItem $item): self
    {
        if (!Livewire::isLivewireRequest()) {
            $this->items->push($item);
        }

        return $this;
    }

    public function getItems(): Collection
    {
        return $this->items->sortBy('navigationSort')
            ->filter(function ($item) {

                $item->visible($item->isVisible());

                if ($item->isVisible()) {

                    if ($item instanceof SidebarGroup) {
                        $item->getItems();
                    }

                    if ($item->isCentral && ! tenant()) {
                        return true;
                    }
                    if (! $item->isCentral) {
                        return true;
                    }
                }

                return false;
            });
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function setIcon(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getKeyName(): string
    {
        return Str::camel($this->name);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getTranslatedName(): string
    {
        return __($this->getName());
    }

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    public function getPermissions(): array
    {
        return $this->permissions;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }
}
