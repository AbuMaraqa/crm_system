<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Services\Widgets;

use Closure;
use Filament\Support\Concerns\EvaluatesClosures;
use Illuminate\Support\Collection;
use Livewire\Livewire;
use Modules\Core\Traits\CanBeHidden;

class WidgetGroup
{
    use CanBeHidden;
    use EvaluatesClosures;

    public int $widgetSort = 1;

    protected string $name;

    protected bool $isNameTranslatable = false;

    protected ?string $icon = null;

    protected Collection $items;

    protected array $columnSpan = [
        'default' => 1,
        'sm' => null,
        'md' => null,
        'lg' => null,
        'xl' => null,
        '2xl' => null,
    ];

    protected array $columns = [
        'default' => 1,
        'sm' => null,
        'md' => null,
        'lg' => null,
        'xl' => null,
        '2xl' => null,
    ];

    protected Closure|bool $isNameHidden = false;

    protected Closure|bool $isRenderAsTab = false;

    public function __construct(string $name)
    {
        $this->name = $name;

        $this->items = collect();
    }

    public static function make(string $name): static
    {
        return new static($name);
    }

    public function addItem(WidgetItem $item): self
    {
        if (! Livewire::isLivewireRequest()) {
            $this->items->push($item);
        }

        return $this;
    }

    public function items(array|Closure $items): self
    {
        $items = $this->evaluate($items);

        $this->items = collect($items);

        return $this;
    }

    public function getItems(): Collection
    {
        return cache()->remember(app()->getLocale().'widget'.$this->name.session()->getId(), 3600, function () {

            return $this->items->sortBy('widgetSort')
                ->filter(function ($item) {
                    $item->visible($item->isVisible());

                    return $item->isVisible();
                });
        });

        // foreach ($this->items->sortBy('widgetSort') as $item) {
        //     if ($item->isVisible()) {
        //         yield $item;
        //     }
        // }
    }

    public function sort(int $widgetSort): static
    {
        $this->widgetSort = $widgetSort;

        return $this;
    }

    public function columns(array|int|string|null $columns = 2): static
    {
        if (! is_array($columns)) {
            $columns = [
                'lg' => $columns,
            ];
        }

        $this->columns = [
            ...($this->columns ?? []),
            ...$columns,
        ];

        return $this;
    }

    public function getColumns(?string $breakpoint = null): array|int|string|null
    {
        $columns = $this->columns;

        if ($breakpoint !== null) {
            return $columns[$breakpoint] ?? null;
        }

        return $columns;
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

    public function translate(): static
    {
        $this->isNameTranslatable = true;

        return $this;
    }

    public function getName(): string
    {
        if ($this->isNameTranslatable) {
            return $this->getTranslatedName();
        }

        return $this->name;
    }

    public function getTranslatedName(): string
    {
        return __($this->name);
    }

    /**
     * @return $this
     */
    public function hiddenName(bool|Closure $condition = true): static
    {
        $this->isNameHidden = $condition;

        return $this;
    }

    public function isNameHidden(): bool
    {
        return (bool) $this->evaluate($this->isNameHidden);
    }
}
