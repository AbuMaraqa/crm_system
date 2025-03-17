<?php

namespace Modules\Shop\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Shop\Database\factories\BannersFactory;
use Modules\Shop\Enums\BannersStatus;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Modules\Shop\Enums\PagesSlugStatus;
use Spatie\Activitylog\LogOptions;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Page extends Model implements TranslatableContract, HasMedia
{
    use HasFactory;
    use Translatable;
    use InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'slug'
    ];

    protected $table = 'shop_pages';

    public $useTranslationFallback = true;

    public array $translatedAttributes = [
        'title',
        'description',
        'content',
        'meta_title',
        'meta_description'
    ];

    protected $casts = [
        'slug'      => PagesSlugStatus::class,
    ];

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
        return route('dashboard.shop.banners.edit', $this->id);
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
            ->addMediaCollection('banners')
            ->singleFile()
            ->useDisk('banners')
            ->useFallbackUrl(asset('/storage/shop/default-images/banner.png'))
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
        if ($this->getFirstMediaUrl('about_us')) {
            return $this->getFirstMediaUrl('about_us');
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
