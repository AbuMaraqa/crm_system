<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 8/2/24, 11:55 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Shop\Entities;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Core\Contracts\ActivityLogsContract;
use Modules\Core\Custom\ActivityLog\Traits\LogsActivity;
use Modules\Core\Custom\Query\Traits\SoftDeletes;
use Modules\Shop\Enums\ProductAttributeSetDisplayLayout;
use Modules\Shop\Enums\ProductAttributeSetStatus;
use Spatie\Activitylog\LogOptions;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class ProductAttributeSet extends Model implements HasMedia, ActivityLogsContract, TranslatableContract
{
    use InteractsWithMedia;
    use LogsActivity;
    use SoftDeletes;
    use Translatable;

    /**
     * @var string
     */
    protected $table = 'shop_product_attribute_sets';

    /**
     * @var bool
     */
    public $useTranslationFallback = true;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'status',
        'display_layout',
        'sort_order',
    ];

    public array $translatedAttributes = [
        'title',
    ];

    protected $casts = [
        'status'         => ProductAttributeSetStatus::class,
        'display_layout' => ProductAttributeSetDisplayLayout::class,
    ];


    /**
     * @return LogOptions
     */
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('Tag Attribute Set')
            ->dontSubmitEmptyLogs()
            ->logFillable()
            ->setDescriptionForEvent(fn(string $eventName) => "Tag Attribute Set [ID: {$this->id}, Title: {$this->getTitle()}] has been {$eventName}")
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
        return route('dashboard.shop.product_attribute_sets.edit', $this->id);
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->translateOrDefault()->title;
    }

    /**
     * @return void
     */
    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('product_attributes')
            ->singleFile()
            ->useDisk('product_attributes')
            ->acceptsMimeTypes([
                'image/png',
                'image/jpg',
                'image/jpeg',
                'image/webp',
            ]);
    }


    /**
     * @return array
     */
    public function getAttributeImages(): array
    {
        $gallery = $this->getMedia('product_attributes');
        $images  = [];
        foreach ($gallery as $image) {
            $images[] = $image->getUrl();
        }
        return $images;
    }
}
