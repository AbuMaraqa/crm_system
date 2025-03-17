<?php

namespace Modules\Money\Services\Formatters;

use Brick\Math\RoundingMode;
use Modules\Core\Services\Formatters\Formatter;
use Modules\Money\Services\Money\Money as MoneyMoney;

class Money extends Formatter
{
    public function renderAsHtml(): ?string
    {
        if (blank($this->getState())) {
            return null;
        }

        return MoneyMoney::ofCurrentCurrency($this->getState(), roundingMode: RoundingMode::UP)
            ->toAppFormat();
    }

    public function getMoney(): ?string
    {
        if (blank($this->getState())) {
            return null;
        }

        return MoneyMoney::ofCurrentCurrency($this->getState(), roundingMode: RoundingMode::UP)
            ->toAppFormat();
    }
}
