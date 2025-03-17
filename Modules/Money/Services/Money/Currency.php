<?php

namespace Modules\Money\Services\Money;

use Modules\Core\Services\Settings\ApplicationSettings;

class Currency
{
    public static function appCurrencyCode(): string
    {
        $applicationSettings = app(ApplicationSettings::class);

        $currencyCode = $applicationSettings->getValue('app_currency');

        $currencyCode = $currencyCode ? $currencyCode : 'ILS';

        return $currencyCode;
    }

    public static function appCurrencySign(): string
    {
        $currencyCode = static::appCurrencyCode();

        $formatter = new \NumberFormatter('en_US', \NumberFormatter::CURRENCY);

        $formattedCurrency = $formatter->formatCurrency(0, $currencyCode);

        return mb_substr($formattedCurrency, 0, 1);
    }
}
