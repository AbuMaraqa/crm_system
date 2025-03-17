<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Services\Sidebar;

use Filament\Support\Concerns\EvaluatesClosures;
use Modules\Core\Traits\CanBeHidden;

class SidebarItem
{
    use CanBeHidden;
    use EvaluatesClosures;

    public int $navigationSort;

    public array $permissions;

    public string $name;

    public string $routeName;

    public ?string $icon;

    public bool $isCentral;

    public ?string $description;

    public function __construct(int $navigationSort, array $permissions, string $name, string $routeName, ?string $icon = null, bool $isCentral = false, ?string $description = null)
    {
        $this->navigationSort = $navigationSort;

        $this->permissions = $permissions;

        $this->name = $name;

        $this->routeName = $routeName;

        $this->icon = $icon;

        $this->isCentral = $isCentral;

        $this->description = $description;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function setRouteName(string $routeName): self
    {
        $this->routeName = $routeName;

        return $this;
    }

    public function setIcon(string $name): self
    {
        $this->name = $name;

        return $this;
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

    public function getRouteName(): string
    {
        return $this->routeName;
    }

    public function getUrl(): string
    {
        return route($this->getRouteName());
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
