<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/2/24, 9:34 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Filament\Tables\Columns;

use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Carbon;

class EventAtColumn extends TextColumn
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->description(function (?Carbon $state) {
                return $state?->since();
            })
            ->weight('semibold')
            ->toggleable()
            ->sortable()
            ->date();
    }

    public function createdAt(): static
    {
        $this->label(__('Created At'));

        return $this;
    }

    public function updatedAt(): static
    {
        $this->label(__('Updated At'));

        return $this;
    }
}
