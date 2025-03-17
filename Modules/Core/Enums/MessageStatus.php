<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;
use Illuminate\Support\Str;

enum MessageStatus: string implements HasColor, HasIcon, HasLabel
{
    case Opened = 'Opened';
    case Closed = 'Closed';

    public static function toArray(): array
    {
        $array = [];
        foreach (self::cases() as $case) {
            $array[$case->value] = Str::title($case->value);
        }

        return $array;
    }

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Opened => __('Opened'),
            self::Closed => __('Closed'),
        };
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::Opened => 'success',
            self::Closed => 'danger',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::Opened => 'heroicon-m-check-circle',
            self::Closed => 'heroicon-m-x-mark',
        };
    }
}
