<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 7/17/24, 6:40 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Shop\Entities;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Core\Contracts\ActivityLogsContract;
use Modules\Core\Custom\ActivityLog\Traits\LogsActivity;
use Modules\Core\Custom\Query\Traits\SoftDeletes;
use Modules\Shop\Enums\BrandStatus;
use Modules\Shop\Enums\ProductLabelStatus;
use Spatie\Activitylog\LogOptions;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class ProductLabel extends Model implements ActivityLogsContract, TranslatableContract
{
    use LogsActivity;
    use SoftDeletes;
    use Translatable;

    /**
     * @var string
     */
    protected $table = 'shop_product_labels';

    /**
     * @var bool
     */
    public $useTranslationFallback = true;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'status',
        'color',
        'background_color',
        'text_color',
    ];

    public array $translatedAttributes = [
        'title',
    ];

    protected $casts = [
        'status'      => ProductLabelStatus::class,
    ];

    /**
     * @return LogOptions
     */
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('Tag Label')
            ->dontSubmitEmptyLogs()
            ->logFillable()
            ->setDescriptionForEvent(fn(string $eventName) => "Tag Label [ID: {$this->id}, Title: {$this->getTitle()}] has been {$eventName}")
            ->dontLogIfAttributesChangedOnly(['updated_at']);
    }

    /**
     * @return string
     */
    public function getRecordLabel(): string
    {
        return $this->getTitle();
    }

    /**
     * @return string|null
     */
    public function getRecordUrl(): ?string
    {
        return route('dashboard.shop.product_labels');
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->translateOrDefault()->title;
    }
}
