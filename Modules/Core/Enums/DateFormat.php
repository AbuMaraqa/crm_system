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

enum DateFormat: string implements HasDescription, HasLabel
{
    case Format1 = 'd/m/Y';
    case Format2 = 'm/d/Y';
    case Format3 = 'Y/m/d';
    case Format4 = 'd-m-Y';
    case Format5 = 'm-d-Y';
    case Format6 = 'Y-m-d';
    case Format7 = 'F j, Y';
    case Format8 = 'j F, Y';
    case Format9 = 'j l M Y';
    case Format10 = 'l j M Y';
    case Format11 = 'Y M j';
    case Format12 = 'd/m/y';
    case Format13 = 'l, F j, Y';
    case Format14 = 'l, M j, Y';

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
            self::Format1 => 'DD/MM/YYYY',
            self::Format2 => 'MM/DD/YYYY',
            self::Format3 => 'YYYY/MM/DD',
            self::Format4 => 'DD-MM-YYYY',
            self::Format5 => 'MM-DD-YYYY',
            self::Format6 => 'YYYY-MM-DD',
            self::Format7 => 'Month D, YYYY',
            self::Format8 => 'D Month, YYYY',
            self::Format9 => 'D Day Month YYYY',
            self::Format10 => 'Day D Month YYYY',
            self::Format11 => 'YYYY Month D',
            self::Format12 => 'DD/MM/YY',
            self::Format13 => 'Day, Month D, YYYY',
            self::Format14 => 'Day, Mon D, YYYY',
        };
    }

    public function getDescription(): ?string
    {

        return __('Example').': '.now()->translatedFormat($this->value);
    }
}
