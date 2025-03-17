<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Services\Widgets;

use Closure;
use Filament\Infolists\Components\Concerns\CanSpanColumns;
use Filament\Infolists\Components\Concerns\HasChildComponents;
use Filament\Infolists\Components\Concerns\HasId;
use Filament\Infolists\Components\Concerns\HasLabel;
use Filament\Infolists\Concerns\HasColumns;
use Filament\Support\Components\ViewComponent;
use Filament\Support\Concerns\HasExtraAttributes;
use Modules\Core\Traits\CanBeHidden;

class WidgetTabs extends ViewComponent
{
    use CanBeHidden;
    use CanSpanColumns;
    use HasChildComponents;
    use HasColumns;
    use HasExtraAttributes;
    use HasId;
    use HasLabel;

    public int|Closure $activeTab = 1;

    protected string|Closure|null $tabQueryStringKey = null;

    public function __construct()
    {
        $this->id(uniqid());
    }

    public static function make(): static
    {
        return new static();
    }

    /**
     * @return $this
     */
    public function tabs(array|Closure $tabs): static
    {
        $this->childComponents($tabs);

        return $this;
    }

    /**
     * @return $this
     */
    public function activeTab(int|Closure $activeTab): static
    {
        $this->activeTab = $activeTab;

        return $this;
    }

    public function getActiveTab(): int
    {
        if ($this->isTabPersistedInQueryString()) {
            $queryStringTab = request()->query($this->getTabQueryStringKey());

            foreach ($this->getChildComponentContainer()->getComponents() as $index => $tab) {
                if ($tab->getId() !== $queryStringTab) {
                    continue;
                }

                return $index + 1;
            }
        }

        return $this->evaluate($this->activeTab);
    }

    public function getTabQueryStringKey(): ?string
    {
        return $this->evaluate($this->tabQueryStringKey);
    }

    public function isTabPersistedInQueryString(): bool
    {
        return filled($this->getTabQueryStringKey());
    }

    /**
     * @return $this
     */
    public function persistTabInQueryString(string|Closure|null $key = 'tab'): static
    {
        $this->tabQueryStringKey = $key;

        return $this;
    }
}
