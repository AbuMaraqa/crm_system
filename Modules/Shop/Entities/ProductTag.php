<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 7/30/24, 6:34 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Shop\Entities;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Core\Contracts\ActivityLogsContract;
use Modules\Core\Custom\ActivityLog\Traits\LogsActivity;
use Modules\Core\Custom\Query\Traits\SoftDeletes;
use Modules\Shop\Enums\ProductTagStatus;
use Spatie\Activitylog\LogOptions;

class ProductTag extends Model implements ActivityLogsContract, TranslatableContract
{
    use LogsActivity;
    use SoftDeletes;
    use Translatable;

    /**
     * @var string
     */
    protected $table = 'shop_product_tags';

    /**
     * @var bool
     */
    public $useTranslationFallback = true;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'status',
    ];

    public array $translatedAttributes = [
        'title',
    ];

    protected $casts = [
        'status'      => ProductTagStatus::class,
    ];

    /**
     * @return LogOptions
     */
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('Tag Tag')
            ->dontSubmitEmptyLogs()
            ->logFillable()
            ->setDescriptionForEvent(fn(string $eventName) => "Tag Tag [ID: {$this->id}, Title: {$this->getTitle()}] has been {$eventName}")
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
        return route('dashboard.shop.product_tags');
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->translateOrDefault()->title;
    }

    public static function getAllTitles(): array
    {
        return self::hasMany(ProductTagTranslation::class, 'product_tag_id', 'id')->pluck('title')->toArray();
    }
}
