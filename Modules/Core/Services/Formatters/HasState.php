<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Services\Formatters;

use Closure;

trait HasState
{
    protected mixed $defaultState = null;

    protected mixed $getStateUsing = null;

    protected bool|Closure $isDistinctList = false;

    public function getStateUsing(mixed $callback): static
    {
        $this->getStateUsing = $callback;

        return $this;
    }

    public function state(mixed $state): static
    {
        $this->getStateUsing($state);

        return $this;
    }

    public function default(mixed $state): static
    {
        $this->defaultState = $state;

        return $this;
    }

    public function distinctList(bool|Closure $condition = true): static
    {
        $this->isDistinctList = $condition;

        return $this;
    }

    public function isDistinctList(): bool
    {
        return (bool) $this->evaluate($this->isDistinctList);
    }

    public function getDefaultState(): mixed
    {
        return $this->evaluate($this->defaultState);
    }

    public function getState(): mixed
    {
        $state = null;

        if ($this->getStateUsing !== null) {
            $state = $this->evaluate($this->getStateUsing);
        }

        if (blank($state)) {
            $state = $this->getDefaultState();
        }

        return $state;
    }
}
