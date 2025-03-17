<?php

/*************************************************
 * Copyright (c) 2024.
 *
 * @Author : Shaker Awad <awadshaker74@gmail.com>
 * @Date   : 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\ImageManagerStatic as Image;
use Modules\Core\Services\Settings\ApplicationSettings;
use Modules\Core\Traits\RefreshesSettingCache;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Setting extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    use RefreshesSettingCache;

    /**
     * @var string
     */
    protected $table = 'settings';

    /**
     * @var string[]
     */
    protected $fillable = [
        'key',
        'value',
    ];


    /**
     * @return void
     */
    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('website-logo')
            ->singleFile()
            ->registerMediaConversions(function (Media $media) {

                $this->addMediaConversion('logo-lg')
                    ->width(300)
                    ->format(Manipulations::FORMAT_PNG);

                $this->addMediaConversion('logo-md')
                    ->width(200)
                    ->format(Manipulations::FORMAT_PNG);

                $this->addMediaConversion('logo-sm')
                    ->width(100)
                    ->format(Manipulations::FORMAT_PNG);

                $this->addMediaConversion('logo-xs')
                    ->width(50)
                    ->format(Manipulations::FORMAT_PNG);
            });

        $this
            ->addMediaCollection('website-favicons')
            ->singleFile()
            ->registerMediaConversions(function (Media $media) {

                $this->addMediaConversion('favicon-16x16')
                    ->fit(Manipulations::FIT_STRETCH, 16, 16)
                    ->format(Manipulations::FORMAT_PNG);

                $this->addMediaConversion('favicon-32x32')
                    ->fit(Manipulations::FIT_STRETCH, 32, 32)
                    ->format(Manipulations::FORMAT_PNG);

                $this->addMediaConversion('favicon-48x48')
                    ->fit(Manipulations::FIT_STRETCH, 48, 48)
                    ->format(Manipulations::FORMAT_PNG);

                $this->addMediaConversion('favicon-96x96')
                    ->fit(Manipulations::FIT_STRETCH, 96, 96)
                    ->format(Manipulations::FORMAT_PNG);

                $this->addMediaConversion('android-icon-192x192')
                    ->fit(Manipulations::FIT_STRETCH, 192, 192)
                    ->format(Manipulations::FORMAT_PNG);

                $this->addMediaConversion('apple-icon-57x57')
                    ->fit(Manipulations::FIT_STRETCH, 57, 57)
                    ->format(Manipulations::FORMAT_PNG);

                $this->addMediaConversion('apple-icon-60x60')
                    ->fit(Manipulations::FIT_STRETCH, 60, 60)
                    ->format(Manipulations::FORMAT_PNG);

                $this->addMediaConversion('apple-icon-72x72')
                    ->fit(Manipulations::FIT_STRETCH, 72, 72)
                    ->format(Manipulations::FORMAT_PNG);

                $this->addMediaConversion('apple-icon-76x76')
                    ->fit(Manipulations::FIT_STRETCH, 76, 76)
                    ->format(Manipulations::FORMAT_PNG);

                $this->addMediaConversion('apple-icon-114x114')
                    ->fit(Manipulations::FIT_STRETCH, 114, 114)
                    ->format(Manipulations::FORMAT_PNG);

                $this->addMediaConversion('apple-icon-120x120')
                    ->fit(Manipulations::FIT_STRETCH, 120, 120)
                    ->format(Manipulations::FORMAT_PNG);

                $this->addMediaConversion('apple-icon-144x144')
                    ->fit(Manipulations::FIT_STRETCH, 144, 144)
                    ->format(Manipulations::FORMAT_PNG);

                $this->addMediaConversion('apple-icon-152x152')
                    ->fit(Manipulations::FIT_STRETCH, 152, 152)
                    ->format(Manipulations::FORMAT_PNG);

                $this->addMediaConversion('apple-icon-180x180')
                    ->fit(Manipulations::FIT_STRETCH, 180, 180)
                    ->format(Manipulations::FORMAT_PNG);
            });
    }

    /**
     * @param $image
     *
     * @return $this
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function addWebsiteLogo($image): static
    {

        $fileName = hash('sha256', $this->name . microtime());

        $stream = Image::make($image)
            ->encode('png')
            ->stream();

        $this->addMediaFromStream($stream)
            ->usingFileName($fileName . '.png')
            ->usingName($this->value)
            ->toMediaCollection('website-logo');

        return $this;
    }

    /**
     * @param $image
     *
     * @return $this
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function addWebsiteFavicon($image): static
    {

        $fileName = hash('sha256', $this->name . microtime());

        $stream = Image::make($image)
            ->encode('png')
            ->stream();

        $this->addMediaFromStream($stream)
            ->usingFileName($fileName . '.png')
            ->usingName($this->value)
            ->toMediaCollection('website-favicons');

        return $this;
    }

    /**
     * @return string
     */
    public static function renderFavicon(): string
    {
        $favicon = app(ApplicationSettings::class);

        return <<<EOF
        <link rel="icon" type="image/png" sizes="16x16" href="{$favicon?->getUrl('website_favicon', 'website-favicons', 'favicon-16x16')}">
        <link rel="icon" type="image/png" sizes="32x32" href="{$favicon?->getUrl('website_favicon', 'website-favicons', 'favicon-32x32')}">
        <link rel="icon" type="image/png" sizes="48x48" href="{$favicon?->getUrl('website_favicon', 'website-favicons', 'favicon-48x48')}">
        <link rel="icon" type="image/png" sizes="96x96" href="{$favicon?->getUrl('website_favicon', 'website-favicons', 'favicon-96x96')}">
        <link rel="icon" type="image/png" sizes="192x192" href="{$favicon?->getUrl('website_favicon', 'website-favicons', 'android-icon-192x192')}">
        <link rel="apple-touch-icon" sizes="57x57" href="{$favicon?->getUrl('website_favicon', 'website-favicons', 'apple-icon-57x57')}">
        <link rel="apple-touch-icon" sizes="60x60" href="{$favicon?->getUrl('website_favicon', 'website-favicons', 'apple-icon-60x60')}">
        <link rel="apple-touch-icon" sizes="72x72" href="{$favicon?->getUrl('website_favicon', 'website-favicons', 'apple-icon-72x72')}">
        <link rel="apple-touch-icon" sizes="76x76" href="{$favicon?->getUrl('website_favicon', 'website-favicons', 'apple-icon-76x76')}">
        <link rel="apple-touch-icon" sizes="114x114" href="{$favicon?->getUrl('website_favicon', 'website-favicons', 'apple-icon-114x114')}">
        <link rel="apple-touch-icon" sizes="120x120" href="{$favicon?->getUrl('website_favicon', 'website-favicons', 'apple-icon-120x120')}">
        <link rel="apple-touch-icon" sizes="144x144" href="{$favicon?->getUrl('website_favicon', 'website-favicons', 'apple-icon-144x144')}">
        <link rel="apple-touch-icon" sizes="152x152" href="{$favicon?->getUrl('website_favicon', 'website-favicons', 'apple-icon-152x152')}">
        <link rel="apple-touch-icon" sizes="180x180" href="{$favicon?->getUrl('website_favicon', 'website-favicons', 'apple-icon-180x180')}">

        EOF;
    }
}
