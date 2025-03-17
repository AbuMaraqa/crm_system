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
use Filament\Infolists\Components\Concerns\HasMaxWidth;
use Filament\Infolists\Concerns\HasColumns;
use Filament\Support\Concerns\HasBadge;
use Filament\Support\Concerns\HasExtraAttributes;
use Filament\Support\Concerns\HasIcon;
use Illuminate\Support\Str;
use Modules\Core\Traits\CanBeHidden;

class WidgetTab
{
    use CanBeHidden;
    use CanSpanColumns;
    use HasBadge;
    use HasChildComponents;
    use HasColumns;
    use HasExtraAttributes;
    use HasIcon;
    use HasId;
    use HasLabel;
    use HasMaxWidth;

    protected bool $shouldOpenUrlInNewTab = false;

    protected string|Closure|null $url = null;

    public function __construct(string $label, ?string $id = null)
    {
        $this->label($label);
        $this->id(Str::slug($id ?: $label));
    }

    public static function make(string $label, ?string $id = null): static
    {
        return new static($label, $id);
    }

    public function getId(): string
    {
        return $this->getId().'-tab';
    }

    public function getColumnsConfig(): array
    {
        return $this->columns;
    }

    public function getChildComponents(): array
    {
        $components = $this->evaluate($this->childComponents);

        usort($components, function ($a, $b) {
            return $a->widgetSort <=> $b->widgetSort;
        });

        return array_filter($components, function ($component) {
            return $component->isVisible();
        });
    }
}
