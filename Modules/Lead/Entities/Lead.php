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
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;
use Modules\Core\Contracts\ActivityLogsContract;
use Modules\Core\Custom\ActivityLog\Traits\LogsActivity;
use Modules\Core\Custom\Query\Traits\SoftDeletes;
use Modules\Leads\Entities\LeadTag;
use Spatie\Activitylog\LogOptions;

class Lead extends Model implements ActivityLogsContract, TranslatableContract
{
    use LogsActivity;
    use SoftDeletes;
    use Translatable;

    /**
     * @var string
     */
    protected $table = 'leads';

    /**
     * @var bool
     */
    public $useTranslationFallback = true;

    public $translationForeignKey = 'lead_id';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'email',
        'phone',
        'status',
        'sub_status',
        'city',
        'country',
        'governorate',
        'district',
    ];

    public array $translatedAttributes = [
        'name',
        'business_name',
        'address',
        'created_by',
    ];

    /**
     * @return LogOptions
     */
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('Departments')
            ->dontSubmitEmptyLogs()
            ->logFillable()
            ->setDescriptionForEvent(fn(string $eventName) => "Tag [ID: {$this->id}, Title: {$this->getTitle()}] has been {$eventName}")
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
        return route('dashboard.lead.departments.edit', $this->id);
    }


    public function getTitle(): string
    {
        return $this->translateOrDefault()->name;
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(LeadTag::class, 'leads_tag_leads', 'lead_id', 'lead_tag_id');
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class, 'city');
    }
}
