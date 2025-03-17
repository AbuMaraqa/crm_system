<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/23/24, 9:35 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Filament\Forms\Components;

use Filament\Forms\Components\CheckboxList;

class TreeCheckboxListField extends CheckboxList
{
    protected string $view = 'core::components.filament.forms.components.tree-checkbox-list-field';

    protected function setUp(): void
    {
        parent::setUp();
    }
}
