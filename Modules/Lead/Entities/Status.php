<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/23/24, 9:35 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Lead\Entities;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;
use Modules\Core\Contracts\ActivityLogsContract;
use Modules\Core\Custom\ActivityLog\Traits\LogsActivity;
use Modules\Core\Custom\Query\Traits\SoftDeletes;
use Spatie\Activitylog\LogOptions;

class Status extends Model implements ActivityLogsContract, TranslatableContract
{
    use LogsActivity;
    use SoftDeletes;
    use Translatable;

    /**
     * @var string
     */
    protected $table = 'lead_status';

    /**
     * @var bool
     */
    public $useTranslationFallback = true;

    public $translationForeignKey = 'status_id';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'department_id',
        'background_color',
        'text_color',
        'sort',
    ];

    public array $translatedAttributes = [
        'title',
    ];

    /**
     * @return LogOptions
     */
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('Status')
            ->dontSubmitEmptyLogs()
            ->logFillable()
            ->setDescriptionForEvent(fn(string $eventName) => "Status [ID: {$this->id}, Title: {$this->getTitle()}] has been {$eventName}")
            ->dontLogIfAttributesChangedOnly(['updated_at']);
    }

    /**
     * @return string
     */
    public function getRecordLabel(): string
    {
        return $this->getTitle();
    }

    public function getRecordUrl(): ?string
    {
        return route('dashboard.lead.statuses.edit', $this->id);
    }


    public function getTitle(): string
    {
        return $this->translateOrDefault()->title;
    }

    public function subStatuses()
    {
        return $this->hasMany(SubStatus::class , 'status_id');
    }
}
