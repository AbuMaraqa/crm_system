<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Enums;

use Filament\Support\Contracts\HasDescription;
use Filament\Support\Contracts\HasLabel;

enum TimeFormat: string implements HasDescription, HasLabel
{
    case Format1 = 'h:i A';
    case Format2 = 'H:i';

    public function getLabel(): ?string
    {
        $result = '<div>';
        $result .= "<p class='italic'>{$this->getHumanReadableFormat()}</p>";
        $result .= "<p class='text-gray-500'>".__('Example').': '.now()->translatedFormat($this->value).'</p>';
        $result .= '</div>';

        return $result;
    }

    public function getHumanReadableFormat(): string
    {
        return match ($this) {
            self::Format1 => '12-Hour',
            self::Format2 => '24-Hour',
        };
    }

    public function getDescription(): ?string
    {

        return __('Example').': '.now()->translatedFormat($this->value);
    }
}
