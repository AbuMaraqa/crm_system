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

enum MessageSeverity: string implements HasColor, HasIcon, HasLabel
{
    case Info = 'info';
    case Warning = 'warning';
    case Danger = 'danger';

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
            self::Info => __('Info'),
            self::Warning => __('Warning'),
            self::Danger => __('Danger'),
        };
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::Info => 'info',
            self::Warning => 'warning',
            self::Danger => 'danger',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::Info => 'heroicon-m-information-circle',
            self::Warning => 'heroicon-m-exclamation-circle',
            self::Danger => 'heroicon-m-x-circle',
        };
    }
}
