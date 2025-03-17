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

enum PagesSlugStatus: string
{
    case ABOUT_US           = 'about-us';
    case TERMS_AND_CONDITION           = 'terms-and-conditions';

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
            self::ABOUT_US    => __('About Us'),
            self::TERMS_AND_CONDITION    => __('Terms and Conditions'),
        };
    }

    /**
     * @return string | array | null
     */
    // public function getColor(): string|array|null
    // {
    //     return match ($this) {
    //         self::RADIO    => 'success',
    //         self::DROPDOWN => 'warning',
    //         self::COLOR    => 'blue',
    //         self::IMAGE    => 'purple',
    //     };
    // }

    /**
     * @return string
     */
    // public function getIcon(): string
    // {
    //     return match ($this) {
    //         self::RADIO    => 'iconsax-bul-cd',
    //         self::DROPDOWN => 'iconsax-bul-arrow-square-down',
    //         self::COLOR    => 'iconsax-bul-colorfilter',
    //         self::IMAGE    => 'iconsax-bul-gallery-tick',
    //     };
    // }

    /**
     * @return string
     */
    public function renderAsBadge(): string
    {
        $label = $this->getLabel();

        return <<<HTML
            <div class="badge space-x-2.5 rounded-full dark:bg-info/15">
                <span>{$label}</span>
            </div>
        HTML;
    }
}
