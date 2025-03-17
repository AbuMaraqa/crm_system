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
use Illuminate\Support\Str;
use Modules\Core\Contracts\ActivityLogsContract;
use Modules\Core\Custom\ActivityLog\Traits\LogsActivity;
use Modules\Core\Custom\Query\Traits\SoftDeletes;
use Spatie\Activitylog\LogOptions;

class Source extends Model implements ActivityLogsContract, TranslatableContract
{
    use LogsActivity;
    use SoftDeletes;
    use Translatable;

    /**
     * @var string
     */
    protected $table = 'lead_source';

    /**
     * @var bool
     */
    public $useTranslationFallback = true;

    public $translationForeignKey = 'source_id';

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = [];

    public array $translatedAttributes = [
        'title',
    ];

    /**
     * @return LogOptions
     */
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('Source')
            ->dontSubmitEmptyLogs()
            ->logFillable()
            ->setDescriptionForEvent(fn(string $eventName) => "Source [ID: {$this->id}, Title: {$this->getTitle()}] has been {$eventName}")
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
        return route('dashboard.lead.source.edit', $this->id);
    }


    public function getTitle(): string
    {
        return $this->translateOrDefault()->title;
    }
}
