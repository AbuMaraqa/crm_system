<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Custom\Query;

use Closure;
use Illuminate\Support\Facades\DB;
use Spatie\Activitylog\Facades\LogBatch;

class QueryContainer
{
    protected bool $withinDatabaseTransaction = true;

    protected int $databaseTransactionAttempts = 1;

    protected bool $withinlogBatch = true;

    public static function make(): static
    {
        return new static;
    }

    public function wrap(Closure $callback): mixed
    {
        $result = null;

        if ($this->withinlogBatch) {
            LogBatch::startBatch();
        }

        if ($this->withinDatabaseTransaction) {
            $result = DB::transaction($callback, $this->databaseTransactionAttempts);
        } else {
            $result = $callback();
        }

        if ($this->withinlogBatch) {
            LogBatch::endBatch();
        }

        return $result;
    }

    public function withinDatabaseTransaction(bool $condition = true, int $attempts = 1): static
    {
        $this->withinDatabaseTransaction = $condition;
        $this->databaseTransactionAttempts = $attempts;

        return $this;
    }

    public function logBatch(bool $condition = true): static
    {
        $this->withinlogBatch = $condition;

        return $this;
    }
}
