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
use Filament\Support\Contracts\HasLabel;
use Illuminate\Support\HtmlString;

enum ExportStatus: int implements HasColor, HasLabel
{
    case Pending = 0;
    case Processing = 1;
    case Completed = 2;
    case Failed = 3;

    public static function toArray(bool $isHtmlStringObjectResponse = false): array
    {
        $array = [];
        foreach (self::cases() as $case) {
            $array[$case->value] = $isHtmlStringObjectResponse ? new HtmlString($case->renderNameColorHtml()) : $case->renderNameColorHtml();
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
            self::Pending => __('Pending'),
            self::Processing => __('Processing'),
            self::Completed => __('Completed'),
            self::Failed => __('Failed'),
        };
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::Pending => Color::Gray,
            self::Processing => Color::Yellow,
            self::Completed => Color::Green,
            self::Failed => Color::Red,
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
