<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Entities;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Agent\Agent;

class Session extends Model
{
    protected $casts = [
        'last_activity' => 'datetime',
        'id' => 'string',
    ];

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
