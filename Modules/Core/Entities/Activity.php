<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Entities;

use Jenssegers\Agent\Agent;
use Spatie\Activitylog\Models\Activity as ModelsActivity;

class Activity extends ModelsActivity
{
    protected static function boot()
    {
        parent::boot();

        static::saving(function (Activity $activity) {
            $activity->ip_address = request()->ip();
            $activity->user_agent = request()->userAgent();
        });
    }

    public function getParsedUserAgent(): string
    {
        $agent = new Agent();

        $agent->setUserAgent($this->user_agent);
        $output = '';

        $output .= $agent->device().', ';
        $output .= $agent->platform().'('.$agent->version($agent->platform()).'), ';
        $output .= $agent->browser().'('.$agent->version($agent->browser()).'), ';
        $output .= $agent->isRobot() ? 'Robot' : 'Human';

        return $output;
    }
}
