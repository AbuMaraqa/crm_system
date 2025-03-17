<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Services\Render;

use Filament\Forms\Components\ColorPicker;

class ColorInputService
{
    public static function make(string $name): ColorPicker
    {
        return ColorPicker::make($name);
    }
}
