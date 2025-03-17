<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Custom\Query\Traits;

use Illuminate\Database\Eloquent\SoftDeletes as EloquentSoftDeletes;
use Modules\Core\Custom\Query\QueryContainer;

trait SoftDeletes
{
    use EloquentSoftDeletes {
        restore as parentRestore;
        // performDeleteOnModel as parentPerformDeleteOnModel;
    }

    public function delete()
    {
        return QueryContainer::make()
            ->wrap(function () {
                return parent::delete();
            });
    }

    public function restore()
    {
        return QueryContainer::make()
            ->wrap(function () {
                return $this->parentRestore();
            });
    }
}
