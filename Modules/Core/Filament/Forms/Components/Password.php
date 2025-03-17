<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Filament\Forms\Components;

use Closure;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Str;
use Modules\Core\Filament\Traits\CanCopy;
use Modules\Core\Filament\Traits\CanGenerate;

class Password extends TextInput
{
    use CanCopy;
    use CanGenerate;

    protected string $view = 'core::components.filament.forms.components.password';

    protected string $showIcon = 'heroicon-s-eye';

    protected string $hideIcon = 'heroicon-s-eye-slash';

    protected bool|Closure $revealable = true;

    protected bool|Closure $initiallyHidden = true;

    public function revealable(bool|Closure $condition = true): static
    {
        $this->revealable = $condition;

        return $this;
    }

    public function initiallyHidden(bool|Closure $condition = true): static
    {
        $this->initiallyHidden = $condition;

        return $this;
    }

    public function showIcon(string $icon): static
    {
        $this->showIcon = $icon;

        return $this;
    }

    public function hideIcon(string $icon): static
    {
        $this->hideIcon = $icon;

        return $this;
    }

    public function getShowIcon(): string
    {
        return $this->showIcon;
    }

    public function getHideIcon(): string
    {
        return $this->hideIcon;
    }

    public function isRevealable(): bool
    {
        return (bool) $this->evaluate($this->revealable);
    }

    public function isInitiallyHidden(): bool
    {
        return (bool) $this->evaluate($this->initiallyHidden);
    }

    public function getXRef(): string
    {
        return Str::of($this->getId())->replace('.', '_')->prepend('input_')->studly()->snake()->__toString();
    }
}
