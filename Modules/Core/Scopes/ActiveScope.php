<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class ActiveScope implements Scope
{
    protected array $extensions = ['Enable', 'WithDisabled', 'WithoutDisabled', 'OnlyDisabled'];

    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
        $builder->where($builder->getModel()->getStatusColumn(), true);
    }

    public function extend(Builder $builder)
    {
        foreach ($this->extensions as $extension) {
            $this->{"add{$extension}"}($builder);
        }
    }

    protected function addEnable(Builder $builder)
    {
        $builder->macro('enable', function (Builder $builder) {
            return $builder->update([$builder->getModel()->getStatusColumn() => true]);
        });
    }

    protected function addWithDisabled(Builder $builder)
    {
        $builder->macro('withDisabled', function (Builder $builder) {
            return $builder->withoutGlobalScope($this);
        });
    }

    protected function addWithoutDisabled(Builder $builder)
    {
        $builder->macro('withoutDisabled', function (Builder $builder) {
            return $builder->withoutGlobalScope($this)->where(
                $builder->getModel()->getStatusColumn(),
                true
            );
        });
    }

    protected function addOnlyDisabled(Builder $builder)
    {
        $builder->macro('onlyDisabled', function (Builder $builder) {
            return $builder->withoutGlobalScope($this)->where(
                $builder->getModel()->getStatusColumn(),
                false
            );
        });
    }
}
