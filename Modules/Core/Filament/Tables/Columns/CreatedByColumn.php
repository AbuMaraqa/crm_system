<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/23/24, 9:35 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Filament\Tables\Columns;

use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Carbon;
use Modules\Core\Entities\User;

class CreatedByColumn extends TextColumn
{
    /**
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Created By'))
            ->formatStateUsing(function (User $user) {
                return $user->renderAsTableColumn();
            })
            ->html()
            ->wrap()
            ->searchable(['first_name', 'last_name'], isIndividual: true)
            ->sortable();
    }
}
