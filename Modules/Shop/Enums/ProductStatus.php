<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/2/24, 9:34 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Shop\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;
use Illuminate\Support\Str;

enum ProductStatus: int implements HasLabel, HasColor, HasIcon
{
    case Published       = 1;
    case Draft           = 2;
    case Hidden          = 3;
    case Pending         = 4;
    case RequireApproval = 5;
    case Rejected        = 6;


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
            self::Published       => __('Published'),
            self::Draft           => __('Draft'),
            self::Hidden          => __('Hidden'),
            self::Pending         => __('Pending'),
            self::RequireApproval => __('Require Approval'),
            self::Rejected        => __('Rejected'),
        };
    }

    /**
     * @return string
     */
    public function getColor(): string
    {
        return match ($this) {
            self::Published       => 'success',
            self::Draft           => 'warning',
            self::Hidden          => 'danger',
            self::Pending         => 'info',
            self::RequireApproval => 'secondary',
            self::Rejected        => 'error',
        };
    }

    /**
     * @return string
     */
    public function getIcon(): string
    {
        return match ($this) {
            self::Published       => 'phosphor-check-circle',
            self::Draft           => 'phosphor-pen-light',
            self::Hidden          => 'phosphor-eye-slash',
            self::Pending         => 'phosphor-clock-user',
            self::RequireApproval => 'phosphor-user-circle-check',
            self::Rejected        => 'phosphor-x-circle',
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
                $icon
                <span>$label</span>
            </div>
        HTML;
    }
}
