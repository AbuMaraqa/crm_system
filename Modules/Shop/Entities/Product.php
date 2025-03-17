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
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;
use Modules\Core\Contracts\ActivityLogsContract;
use Modules\Core\Custom\ActivityLog\Traits\LogsActivity;
use Modules\Core\Custom\Query\Traits\SoftDeletes;
use Modules\Core\Services\Sluggable\HasSlug;
use Modules\Core\Services\Sluggable\SlugOptions;
use Modules\Shop\Enums\ProductStatus;
use Spatie\Activitylog\LogOptions;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class  Product extends Model implements HasMedia, ActivityLogsContract, TranslatableContract
{
    use InteractsWithMedia;
    use LogsActivity;
    use SoftDeletes;
    use Translatable;
    use HasSlug;

    /**
     * @var string
     */
    protected $table = 'shop_products';

    /**
     * @var bool
     */
    public $useTranslationFallback = true;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'slug',
        'status',
        'sku',
        'quantity',
        'price',
        'sale_price',
        'stock_status',
        'brand_id',
        'category_id',
        'is_featured',
        'is_top',
        'is_hot_deals',
        'is_best_seller',
        'weight',
        'width',
        'height',
        'length',
        'sort_order',
    ];

    public array $translatedAttributes = [
        'title',
        'description',
        'content',
        'seo',
    ];

    protected $casts = [
        'status'         => ProductStatus::class,
        'is_featured'    => 'boolean',
        'is_top'         => 'boolean',
        'is_hot_deals'   => 'boolean',
        'is_best_seller' => 'boolean',
    ];


    /**
     * Bootstrap the model and its traits.
     *
     * @return void
     */
    protected static function boot(): void
    {
        parent::boot();

        static::saving(function ($product) {
            if (empty($product->sku)) {
                $product->sku = $product->generateProductSKU();
            }
        });
    }

    /**
     * @return LogOptions
     */
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('Products')
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
        return route('dashboard.shop.products.edit', $this->id);
    }


    /**
     * @return BelongsToMany
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(
            ProductCategory::class,
            config('shop.prefix_table') . 'product_category_product',
            'product_id',
            'product_category_id'
        );
    }

    /**
     * @return void
     */
    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('product_main_image')
            ->singleFile()
            ->useDisk('products')
            ->useFallbackUrl(asset('/storage/shop/default-images/product.png'))
            ->acceptsMimeTypes([
                'image/png',
                'image/jpg',
                'image/jpeg',
                'image/webp',
            ]);

        $this
            ->addMediaCollection('product_gallery')
            ->useDisk('products')
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
    public function getMainImage(): string
    {
        if ($this->getFirstMediaUrl('product_main_image')) {
            return $this->getFirstMediaUrl('product_main_image');
        } else {
            return asset('storage/shop/default-images/product.png');
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
            return $this->getMainImage();
        }
    }

    /**
     * @return array
     */
    public function getGalleryImages(): array
    {
        $gallery = $this->getMedia('product_gallery');
        $images  = [];
        foreach ($gallery as $image) {
            $images[] = $image->getUrl();
        }
        return $images;
    }


    /**
     * Check if the given SKU is unique.
     *
     * @param string $sku
     *
     * @return bool
     */
    public function checkUniqueSKU(string $sku): bool
    {
        return !Tag::where('sku', $sku)->exists();
    }

    /**
     * Generate a unique product SKU.
     *
     * @param string|null $forceValue
     *
     * @return string
     */
    public function generateProductSKU(string $forceValue = null): string
    {
        do {
            $sku = $this->createSKU($forceValue);
        } while (!$this->checkUniqueSKU($sku));

        return $sku;
    }


    /**
     * Create a SKU based on the product ID and an optional force value.
     *
     * @param string|null $forceValue
     *
     * @return string
     */
    private function createSKU(?string $forceValue = null): string
    {
        $sku = $this->id . ($forceValue ?? '') . microtime(true);
        $sku = str_replace('.', '', $sku);
        return Str::padLeft(substr($sku, 0, 13), 13, '0');
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->translateOrDefault()->title;
    }

    /**
     * @return bool
     */
    public function isNew(): bool
    {
        return $this->created_at->diffInDays() <= 30;
    }

    /**
     * @return SlugOptions
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(
            ProductTag::class,
            config('shop.prefix_table') . 'product_tag_product',
            'product_id',
            'tag_id'
        );
    }

    public function deleteTags(): void
    {
        $this->tags()->detach();
    }

    public function labels(): BelongsToMany
    {
        return $this->belongsToMany(
            ProductLabel::class,
            config('shop.prefix_table') . 'product_label_product',
            'product_id',
            'label_id'
        );
    }

    public function deleteLabels(): void
    {
        $this->labels()->detach();
    }
}
