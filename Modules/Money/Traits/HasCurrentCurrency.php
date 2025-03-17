<?php

namespace Modules\Money\Traits;

use Brick\Math\BigNumber;
use Brick\Math\RoundingMode;
use Brick\Money\Context;
use Brick\Money\Currency as MoneyCurrency;
use Modules\Money\Services\Money\Currency;
use Modules\Money\Services\Money\Money;

trait HasCurrentCurrency
{
    public static function ofCurrentCurrency(
        BigNumber|int|float|string $amount,
        ?Context $context = null,
        int $roundingMode = RoundingMode::UNNECESSARY,
    ): Money {

        $currency = MoneyCurrency::of(Currency::appCurrencyCode());

        return Money::of($amount, $currency, $context, $roundingMode);
    }

    public function toAppFormat(): string
    {
        return $this->formatTo('en_us');
    }
}
