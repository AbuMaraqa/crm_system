<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Filament\Tables\Actions;

use Filament\Tables\Actions\Action;
use Modules\Core\Traits\Impersonates;

class Impersonate extends Action
{
    use Impersonates;

    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->icon('heroicon-m-arrow-left-on-rectangle')
            ->action(fn ($record) => $this->impersonate($this->getImpersonatedRecord() ?? $record))
            ->hidden(fn ($record) => ! $this->canBeImpersonated($this->getImpersonatedRecord() ?? $record));
    }
}
