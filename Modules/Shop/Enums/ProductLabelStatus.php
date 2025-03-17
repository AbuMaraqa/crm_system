<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 7/17/24, 6:37 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Shop\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum ProductLabelStatus: int implements HasLabel, HasColor, HasIcon
{
    case Published = 1;
    case Draft     = 2;
    case Hidden    = 3;


    /**
     * @return array
     */
    public static function toArray(): array
    {
        $array = [];
        foreach (self::cases() as $case) {
            $array[$case->value] = $case->getLabel();
        }

        return $array;
    }

    /**
     * @return array
     */
    public static function values(): array
    {
        $array = [];
        foreach (self::cases() as $case) {
            $array[] = $case->value;
        }

        return $array;
    }

    /**
     * @return string|null
     */
    public function getLabel(): ?string
    {
        return match ($this) {
            self::Published => __('Published'),
            self::Draft     => __('Draft'),
            self::Hidden    => __('Hidden'),
        };
    }

    /**
     * @return string | array | null
     */
    public function getColor(): string | array | null
    {
        return match ($this) {
            self::Published => 'success',
            self::Draft     => 'warning',
            self::Hidden    => 'danger',
        };
    }

    /**
     * @return string
     */
    public function getIcon(): string
    {
        return match ($this) {
            self::Published => 'heroicon-o-check-circle',
            self::Draft     => 'heroicon-o-pencil',
            self::Hidden    => 'heroicon-o-eye-slash',
        };
    }

    /**
     * @return string
     */
    public function renderAsBadge(): string
    {
        $label = $this->getLabel();
        $color = $this->getColor();
        $icon = svg($this->getIcon(), 'w-4 h-4')->toHtml();

        return <<<HTML
            <div class="badge space-x-2.5 rounded-full bg-$color/10 text-$color dark:bg-$color/15">
                <span>$icon</span>
                <span>$label</span>
            </div>
        HTML;
    }
}
