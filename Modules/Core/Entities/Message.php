<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Entities;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Core\Contracts\ActivityLogsContract;
use Modules\Core\Custom\ActivityLog\Traits\LogsActivity;
use Modules\Core\Enums\MessageSeverity;
use Modules\Core\Enums\MessageStatus;
use Spatie\Activitylog\LogOptions;

class Message extends Model implements ActivityLogsContract
{
    use HasFactory;
    use LogsActivity;

    protected $fillable = [
        'user_id',
        'title',
        'message',
        'status',
        'severity',
        'read_at',
    ];

    protected $casts = [
        'status' => MessageStatus::class,
        'severity' => MessageSeverity::class,
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('Messages')
            ->dontSubmitEmptyLogs()
            ->logFillable()
            ->setDescriptionForEvent(fn (string $eventName) => "Message [ID: {$this->id}, Title: {$this->titlr}] has been {$eventName}")
            ->dontLogIfAttributesChangedOnly(['updated_at']);
    }

    public function scopeOpen(Builder $query): void
    {
        $query->where('status', MessageStatus::Opened);
    }

    public function scopeClose(Builder $query): void
    {
        $query->where('status', MessageStatus::Closed);
    }

    public function getRecordLabel(): string
    {
        $trans = 'trans';

        return <<<Html
            <ul class="space-y-1">
                <li class="text-gray-500 font-bold text-xs">
                    {$trans('Type')}: {$trans('Message')}
                </li>
                <li class="text-gray-500 font-bold text-xs">
                    {$trans('ID')}: {$this->id}
                </li>
                <li>{$trans('Name')}: {$this->title}</li>
            </ul>
        Html;
    }

    public function getRecordUrl(): ?string
    {
        return route('dashboard.user_management.users.messages', $this->id);
    }
}
