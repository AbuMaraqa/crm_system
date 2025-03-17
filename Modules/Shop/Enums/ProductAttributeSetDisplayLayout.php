<?php

/*************************************************
 * Copyright (c) 2024.
 *
 * @Author : Shaker Awad <awadshaker74@gmail.com>
 * @Date   : 8/2/24, 11:53 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Shop\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum ProductAttributeSetDisplayLayout: string implements HasLabel, HasColor, HasIcon
{
    case RADIO    = 'radio';
    case DROPDOWN = 'dropdown';
    case COLOR    = 'color';
    case IMAGE    = 'image';


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
            self::RADIO    => __('Radio'),
            self::DROPDOWN => __('Dropdown'),
            self::COLOR    => __('Color'),
            self::IMAGE    => __('Image Display Layout'),
        };
    }

    /**
     * @return string | array | null
     */
    public function getColor(): string|array|null
    {
        return match ($this) {
            self::RADIO    => 'success',
            self::DROPDOWN => 'warning',
            self::COLOR    => 'blue',
            self::IMAGE    => 'purple',
        };
    }

    /**
     * @return string
     */
    public function getIcon(): string
    {
        return match ($this) {
            self::RADIO    => 'iconsax-bul-cd',
            self::DROPDOWN => 'iconsax-bul-arrow-square-down',
            self::COLOR    => 'iconsax-bul-colorfilter',
            self::IMAGE    => 'iconsax-bul-gallery-tick',
        };
    }

    /**
     * @return string
     */
    public function renderAsBadge(): string
    {
        $label = $this->getLabel();
        $color = $this->getColor();
        $icon  = svg($this->getIcon(), 'w-4 h-4')->toHtml();

        return <<<HTML
            <div class="badge space-x-2.5 rounded-full bg-$color/10 text-$color dark:bg-$color/15">
                <span>$icon</span>
                <span>$label</span>
            </div>
        HTML;
    }
}
