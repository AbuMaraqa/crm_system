<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Services\Storage;

use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class TemporaryUrl
{
    protected string $disk;

    protected string $routeName;

    protected string $routeUri;

    public static function make(): static
    {
        return new static();
    }

    public function disk(string $disk): static
    {
        $this->disk = $disk;

        return $this;
    }

    public function route(string $name): static
    {
        $this->routeName = $name;

        return $this;
    }

    public function uri(string $uri): static
    {
        $this->routeUri = $uri;

        return $this;
    }

    protected function getRouteName(): string
    {
        return $this->routeName;
    }

    protected function getRouteUri(): string
    {
        return $this->routeUri;
    }

    public function getDisk(): Filesystem
    {
        return Storage::disk($this->disk);
    }

    protected function registerRoute(): static
    {
        Route::get("/{$this->getRouteUri()}/{path}", function (string $path) {
            $path = base64_decode($path);

            return response()->streamDownload(function () use ($path) {
                echo $this->getDisk()->read($path);
            }, null, [
                'Content-Type' => File::mimeType($this->getDisk()->path($path)),
            ]);
        })->name($this->getRouteName());

        return $this;
    }

    protected function buildTemporaryUrl(): static
    {
        $routeName = $this->getRouteName();

        $this->getDisk()
            ->buildTemporaryUrlsUsing(function ($path, $expiration, $options) use ($routeName) {
                return URL::temporarySignedRoute(
                    $routeName,
                    $expiration,
                    array_merge($options, ['path' => base64_encode($path)])
                );
            });

        return $this;
    }

    public function build(): static
    {
        // $this->registerRoute();

        $this->buildTemporaryUrl();

        return $this;
    }
}
