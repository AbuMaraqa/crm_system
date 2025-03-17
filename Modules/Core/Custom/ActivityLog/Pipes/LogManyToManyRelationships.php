<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Custom\ActivityLog\Pipes;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Spatie\Activitylog\Contracts\LoggablePipe;
use Spatie\Activitylog\EventLogBag;

class LogManyToManyRelationships implements LoggablePipe
{
    public function __construct(protected string $relationship, protected array $old, protected array $new)
    {
    }

    public function handle(EventLogBag $event, \Closure $next): EventLogBag
    {
        // dd($event);
        $key = Str::snake($this->relationship);

        $event->changes = Arr::add($event->changes, "attributes.$key", $this->new);

        $event->changes = Arr::add($event->changes, "old.$key", $this->old);

        return $next($event);
    }
}
