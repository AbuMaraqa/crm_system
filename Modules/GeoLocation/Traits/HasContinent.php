<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 2/18/24, 9:59 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\GeoLocation\Traits;

trait HasContinent
{
    public static function getContinentAsOptions(): array
    {
        return [
            'Asia' => __('Asia'),
            'Africa' => __('Africa'),
            'Europe' => __('Europe'),
            'North America' => __('North America'),
            'South America' => __('South America'),
            'Oceania' => __('Oceania'),
            'Antarctica' => __('Antarctica'),
        ];
    }
}
