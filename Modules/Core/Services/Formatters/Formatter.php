<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Services\Formatters;

use Filament\Support\Concerns\EvaluatesClosures;

abstract class Formatter
{
    use EvaluatesClosures;
    use HasState;

    public static function make(): static
    {
        return new static();
    }

    abstract public function renderAsHtml(): ?string;
}
