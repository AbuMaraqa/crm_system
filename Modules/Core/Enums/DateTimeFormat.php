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

enum DateTimeFormat: string implements HasDescription, HasLabel
{
    case Format1 = 'm/d/Y h:i A';
    case Format2 = 'd/m/Y h:i A';
    case Format3 = 'j M Y h:i A';
    case Format4 = 'D, M j, Y h:i A';
    case Format5 = 'D, j M Y h:i A';
    case Format6 = 'l, j F Y h:i A';
    case Format7 = 'Y-m-d H:i';
    case Format8 = 'd/m/Y H:i';
    case Format9 = 'm/d/Y H:i';
    case Format10 = 'j M Y H:i';
    case Format11 = 'D, M j, Y H:i';
    case Format12 = 'D, j M Y H:i';
    case Format13 = 'l, j F Y H:i';

    public function getLabel(): ?string
    {
        $result = "<div class='space-y-0.5'>";
        $result .= "<p class='italic'>{$this->getHumanReadableFormat()}</p>";
        $result .= "<p class='text-gray-500'>".__('Example').': '.now()->translatedFormat($this->value).'</p>';
        $result .= '</div>';

        return $result;
    }

    public function getHumanReadableFormat(): string
    {
        return match ($this) {
            self::Format1 => 'MM/DD/YYYY hh:mm A',
            self::Format2 => 'DD/MM/YYYY hh:mm A',
            self::Format3 => 'D Month YYYY hh:mm A',
            self::Format4 => 'D, Month DD, YYYY hh:mm A',
            self::Format5 => 'D, DD Month YYYY hh:mm A',
            self::Format6 => 'Day, DD Month YYYY hh:mm A',
            self::Format7 => 'YYYY-MM-DD HH:mm',
            self::Format8 => 'DD/MM/YYYY HH:mm',
            self::Format9 => 'MM/DD/YYYY HH:mm',
            self::Format10 => 'D Month YYYY HH:mm',
            self::Format11 => 'D, Month DD, YYYY HH:mm',
            self::Format12 => 'D, DD Month YYYY HH:mm',
            self::Format13 => 'Day, DD Month YYYY HH:mm',
        };
    }

    public function getDescription(): ?string
    {
        return __('Example').': '.now()->translatedFormat($this->value);
    }
}
