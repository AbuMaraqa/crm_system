<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Jenssegers\Agent\Agent;
use Modules\Core\Enums\ActivityLogStatus;

class ActivityLog extends Model
{
    use HasFactory;

    public $orderable = [
        'id',
        'event_name',
    ];

    public $filterable = [
        'id',
        'event_name',
    ];

    protected $fillable = [
        'user_id',
        'event_name',
        'description',
        'subject_id',
        'subject_type',
        'group',
        'status',
        'data',
        'ip_address',
        'user_agent',
    ];

    protected $casts = [
        'status' => ActivityLogStatus::class,
        'data' => 'array',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function subject(): MorphTo
    {
        return $this->morphTo();
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
