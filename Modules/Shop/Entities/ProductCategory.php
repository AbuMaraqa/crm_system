<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/23/24, 9:35 AM.
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
use Modules\Shop\Enums\ProductCategoryStatus;
use Spatie\Activitylog\LogOptions;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class ProductCategory extends Model implements HasMedia, ActivityLogsContract, TranslatableContract
{
    use InteractsWithMedia;
    use LogsActivity;
    use SoftDeletes;
    use Translatable;

    /**
     * @var string
     */
    protected $table = 'shop_product_categories';

    /**
     * @var bool
     */
    public $useTranslationFallback = true;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'parent_id',
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
        'status'      => ProductCategoryStatus::class,
        'is_featured' => 'boolean',
    ];

    /**
     * @return BelongsTo
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'parent_id', 'id');
    }


    /**
     * @return HasMany
     */
    public function children(): HasMany
    {
        return $this->hasMany(ProductCategory::class, 'parent_id');
    }


    /**
     * @return BelongsToMany
     */
    public function products(): BelongsToMany
    {
        return $this
            ->belongsToMany(
                Tag::class,
                config('shop.prefix_table') . 'product_category_product',
                'product_category_id',
                'product_id'
            );
    }


    /**
     * @return LogOptions
     */
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('Tag Category')
            ->dontSubmitEmptyLogs()
            ->logFillable()
            ->setDescriptionForEvent(fn(string $eventName) => "Tag Category [ID: {$this->id}, Title: {$this->getTitle()}] has been {$eventName}")
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
        return route('dashboard.shop.product_categories.edit', $this->id);
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
            ->addMediaCollection('product_categories')
            ->singleFile()
            ->useDisk('product_categories')
            ->useFallbackUrl(asset('/storage/shop/default-images/category.png'))
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
        if ($this->getFirstMediaUrl('product_categories')) {
            return $this->getFirstMediaUrl('product_categories');
        } else {
            return asset('storage/shop/default-images/category.png');
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
