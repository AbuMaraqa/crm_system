<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Filament\Tables\Filters;

use Filament\Tables\Filters\Indicator;
use Filament\Tables\Filters\TernaryFilter;
use Illuminate\Database\Eloquent\Builder;
use Modules\Core\Scopes\ActiveScope;

class DisabledFilter extends TernaryFilter
{
    public static function getDefaultName(): ?string
    {
        return 'disabled';
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->label(__('Disabled Records'));

        $this->placeholder(__('Without Disabled'));

        $this->trueLabel(__('With Disabled'));

        $this->falseLabel(__('Only Disabled'));

        $this->queries(
            true: fn ($query) => $query->withDisabled(),
            false: fn ($query) => $query->onlyDisabled(),
            blank: fn ($query) => $query->withoutDisabled(),
        );

        $this->baseQuery(fn (Builder $query) => $query->withoutGlobalScopes([
            ActiveScope::class,
        ]));

        $this->indicateUsing(function (array $state): array {
            if ($state['value'] ?? null) {
                return [Indicator::make($this->getTrueLabel())];
            }

            if (blank($state['value'] ?? null)) {
                return [];
            }

            return [Indicator::make($this->getFalseLabel())];
        });

    }
}
