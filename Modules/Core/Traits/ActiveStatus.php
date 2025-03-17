<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Traits;

use Illuminate\Database\Eloquent\Builder;
use Modules\Core\Scopes\ActiveScope;

trait ActiveStatus
{
    public static function bootActiveStatus()
    {
        static::addGlobalScope(new ActiveScope);
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where($this->getStatusColumn(), true);
    }

    public function getStatusColumn(): string
    {
        return 'status';
    }

    public function disabled()
    {
        return ! $this->{$this->getStatusColumn()};
    }
}
