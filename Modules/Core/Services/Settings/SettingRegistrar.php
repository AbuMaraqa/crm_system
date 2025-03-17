<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Services\Settings;

use Illuminate\Cache\CacheManager;
use Illuminate\Contracts\Cache\Repository;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;
use Modules\Core\Entities\Setting;

class SettingRegistrar
{
    protected Repository $cache;

    protected CacheManager $cacheManager;

    public static ?Collection $settings = null;

    public static \DateInterval|int $cacheExpirationTime;

    public static string $cacheKey = 'app.settings.cache';

    /**
     * SettingRegistrar constructor.
     */
    public function __construct(CacheManager $cacheManager)
    {
        $this->cacheManager = $cacheManager;
        $this->initializeCache();
    }

    public function initializeCache(): void
    {
        self::$cacheExpirationTime = \DateInterval::createFromDateString('24 hours');

        $this->cache = $this->getCacheStoreFromConfig();
    }

    protected function getCacheStoreFromConfig(): Repository
    {

        $cacheDriver = config('cache.default', 'default');

        if ($cacheDriver === 'default') {
            return $this->cacheManager->store();
        }

        if (! \array_key_exists($cacheDriver, config('cache.stores'))) {
            $cacheDriver = 'array';
        }

        return $this->cacheManager->store($cacheDriver);
    }

    public function forgetCachedSettings(): bool
    {
        static::$settings = null;

        return $this->cache->forget(self::$cacheKey);
    }

    public function clearSettings(): void
    {
        static::$settings = null;
    }

    private function loadSettings()
    {
        if (static::$settings) {
            return;
        }

        static::$settings = $this->cache->remember(self::$cacheKey, self::$cacheExpirationTime, function () {
            return $this->getSettingsForCache();
        });
    }

    public function getSettings(): Collection
    {
        $this->loadSettings();

        return static::$settings;
    }

    public function getSettingsForCache(): Collection
    {
        try {
            return Setting::with(['media'])->get();
        } catch (\Throwable $th) {
            Log::emergency($th->getMessage());
        }

        return Collection::empty();
    }

    public function getCacheRepository(): Repository
    {
        return $this->cache;
    }

    public function getCacheStore(): Store
    {
        return $this->cache->getStore();
    }
}
