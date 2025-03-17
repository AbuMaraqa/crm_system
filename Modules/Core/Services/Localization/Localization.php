<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Services\Localization;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Lang;

class Localization
{
    public static function getAllLocales(): array
    {
        return array_keys(config('app.available_locales'));
    }

    public static function getAllLocalesDetails(): array
    {
        return config('app.available_locales');
    }

    public static function getLocaleDetails(string $locale): array
    {
        return config('app.available_locales')[$locale];
    }

    public static function getCurrentLocaleDetails(?string $property = null): array|string
    {
        if ($property) {
            return self::getLocaleDetails(self::getCurrentLocale())[$property];
        }

        return self::getLocaleDetails(self::getCurrentLocale());
    }

    public static function isLocaleExist(string $locale): bool
    {
        return in_array($locale, self::getAllLocales());
    }

    public static function setLocale(string $locale): void
    {
        if (in_array($locale, array_keys(config('app.available_locales')))) {
            App::setLocale($locale);
        }
    }

    public static function getCurrentLocale(): string
    {
        return App::getLocale();
    }

    public static function getFallbackLocale(): string
    {
        return config('app.fallback_locale');
    }

    public static function getCurrentLocaleDirection(): string
    {
        return self::getCurrentLocaleDetails('direction');
    }

    public static function translate(string $key, array $replace = []): string
    {
        return Lang::get($key, $replace);
    }

    public static function translateInLocale(string $locale, string $key, array $replace = []): string
    {
        $originalLocale = self::getCurrentLocale();
        self::setLocale($locale);
        $translation = self::translate($key, $replace);
        self::setLocale($originalLocale);

        return $translation;
    }
}
