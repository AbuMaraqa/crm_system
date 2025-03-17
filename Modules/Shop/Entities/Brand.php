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
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Core\Contracts\ActivityLogsContract;
use Modules\Core\Custom\ActivityLog\Traits\LogsActivity;
use Modules\Core\Custom\Query\Traits\SoftDeletes;
use Modules\Shop\Enums\BrandStatus;
use Modules\Shop\Enums\ProductCategoryStatus;
use Spatie\Activitylog\LogOptions;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Brand extends Model implements HasMedia, ActivityLogsContract, TranslatableContract
{
    use InteractsWithMedia;
    use LogsActivity;
    use SoftDeletes;
    use Translatable;

    /**
     * @var string
     */
    protected $table = 'shop_brands';

    /**
     * @var bool
     */
    public $useTranslationFallback = true;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'status',
        'slug',
        'is_featured',
        'sort_order',
    ];

    public array $translatedAttributes = [
        'title',
        'description',
        'seo',
    ];

    protected $casts = [
        'status'      => BrandStatus::class,
        'is_featured' => 'boolean',
    ];


    /**
     * @return HasMany
     */
    public function products(): HasMany
    {
        return $this->hasMany(Tag::class, 'brand_id');
    }


    /**
     * @return LogOptions
     */
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('Brand')
            ->dontSubmitEmptyLogs()
            ->logFillable()
            ->setDescriptionForEvent(fn(string $eventName) => "Brand [ID: {$this->id}, Title: {$this->getTitle()}] has been {$eventName}")
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
        return route('dashboard.shop.brands.edit', $this->id);
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
            ->addMediaCollection('brands')
            ->singleFile()
            ->useDisk('brands')
            ->useFallbackUrl(asset('/storage/shop/default-images/brand.png'))
            ->acceptsMimeTypes([
                'image/png',
                'image/jpg',
                'image/jpeg',
                'image/webp',
            ]);

        $this
            ->addMediaCollection('meta_images')
            ->singleFile()
            ->useDisk('meta_images')
            ->acceptsMimeTypes([
                'image/png',
                'image/jpg',
                'image/jpeg',
            ]);
    }


    /**
     * @return string
     */
    public function getImage(): string
    {
        if ($this->getFirstMediaUrl('brands')) {
            return $this->getFirstMediaUrl('brands');
        } else {
            return asset('storage/shop/default-images/brand.png');
        }
    }


    /**
     * @return string
     */
    public function getMetaImage(): string
    {
        if ($this->getFirstMediaUrl('meta_images')) {
            return $this->getFirstMediaUrl('meta_images');
        } else {
            return $this->getImage();
        }
    }
}
