<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Enums;

use Filament\Support\Colors\Color;
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum ExportType: int implements HasColor, HasIcon, HasLabel
{
    case PDF = 0;
    case Excel = 1;
    case Zip = 2;

    public static function options(array $excepts = []): array
    {
        $array = [];
        foreach (self::cases() as $case) {
            if (! in_array($case, $excepts)) {
                $array[$case->value] = $case->getLabel();
            }
        }

        return $array;
    }

    public static function colors(array $excepts = []): array
    {
        $array = [];
        foreach (self::cases() as $case) {
            if (! in_array($case, $excepts)) {
                $array[$case->value] = $case->getColor();
            }
        }

        return $array;
    }

    public static function icons(array $excepts = []): array
    {
        $array = [];
        foreach (self::cases() as $case) {
            if (! in_array($case, $excepts)) {
                $array[$case->value] = $case->getIcon();
            }
        }

        return $array;
    }

    public static function values(): array
    {
        $array = [];
        foreach (self::cases() as $case) {
            $array[] = $case->value;
        }

        return $array;
    }

    public function getLabel(): ?string
    {
        return match ($this) {
            self::PDF => __('PDF'),
            self::Excel => __('Excel'),
            self::Zip => __('Zip'),
        };
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::PDF => Color::Red,
            self::Excel => Color::Green,
            self::Zip => Color::Emerald,
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::PDF => 'fas-file-pdf',
            self::Excel => 'fas-file-excel',
            self::Zip => null,
        };
    }

    public function getExtension(): string|array|null
    {
        return match ($this) {
            self::PDF => 'pdf',
            self::Excel => 'xlsx',
            self::Zip => 'zip',
        };
    }

    public function renderNameColorHtml(): string
    {
        return <<<LABEL
                <div class="relative">
                    <div class="absolute inset-y-0 my-auto w-4 h-4 rounded-full shadow"
                            style="background-color:rgb({$this->getColor()[500]})"></div>
                    <span class="mx-6">
                        {$this->getLabel()}
                    </span>
                </div>
            LABEL;
    }
}
