<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 2/18/24, 9:59 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\GeoLocation\Traits;

use Modules\Core\Services\Localization\Localization;

trait HasName
{
    public function getName(?string $locale = null): string
    {
        if (! $locale) {
            $locale = Localization::getCurrentLocale();
        }

        $name = $this->getAttribute($locale.'_name');
        if (! $name) {
            $name = $this->getAttribute('en_name');
        }

        return $name;
    }
}
