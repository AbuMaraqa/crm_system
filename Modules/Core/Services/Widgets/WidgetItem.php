<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Services\Widgets;

use Closure;
use Modules\Core\Traits\CanBeHidden;

class WidgetItem
{
    use CanBeHidden;

    public int $widgetSort = 1;

    protected array $columnSpan = [
        'default' => 1,
        'sm' => null,
        'md' => null,
        'lg' => null,
        'xl' => null,
        '2xl' => null,
    ];

    protected string $widget;

    public function __construct(string $widget)
    {
        $this->widget = $widget;
    }

    public static function make(string $widget): static
    {
        return new static($widget);
    }

    public function sort(int $widgetSort): static
    {
        $this->widgetSort = $widgetSort;

        return $this;
    }

    public function columnSpan(array|int|string|Closure|null $span): static
    {
        if (! is_array($span)) {
            $span = [
                'default' => $span,
            ];
        }

        $this->columnSpan = [
            ...$this->columnSpan,
            ...$span,
        ];

        return $this;
    }

    public function columnSpanFull(): static
    {
        $this->columnSpan('full');

        return $this;
    }

    public function getColumnSpan(int|string|null $breakpoint = null): array|int|string|null
    {
        $span = $this->columnSpan;

        if ($breakpoint !== null) {
            return $span[$breakpoint] ?? null;
        }

        return array_map(
            fn (array|int|string|Closure|null $value): array|int|string|null => $value,
            $span,
        );
    }

    public function getLivewirePath(): string
    {
        return $this->widget;
    }
}
