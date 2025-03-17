<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/2/24, 9:34 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Filament\Forms\Components;

use Filament\Forms\Components\Field;

class Translations extends Field
{
    protected string $view             = 'core::components.filament.forms.components.translations';
    public array     $availableLocales = [];
    public string    $url;


    /**
     * @param $locales
     *
     * @return $this
     */
    public function availableLocales($locales): static
    {
        $this->availableLocales = $locales;

        return $this;
    }

    /**
     * @return array
     */
    public function getAvailableLocales(): array
    {
        return $this->availableLocales;
    }

    /**
     * @param $url
     *
     * @return $this
     */
    public function url($url): static
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }
}
