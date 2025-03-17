<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Services\Formatters;

use Illuminate\Support\Facades\Blade;

class Email extends Formatter
{
    public function renderAsHtml(): string
    {
        return Blade::render(
            <<<Html
                <x-filament::link dir='ltr'
                    icon="heroicon-m-at-symbol"
                    style='font-weight: inherit	!important'
                    href="mailto:{$this->getState()}">
                    {$this->getState()}
                </x-filament::link>
            Html
        );
    }
}
