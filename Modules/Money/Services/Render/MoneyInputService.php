<?php

namespace Modules\Money\Services\Render;

use Filament\Forms\Components\TextInput;
use Modules\Core\Services\Settings\ApplicationSettings;

class MoneyInputService
{
    public static function make(string $name): TextInput
    {
        $applicationSettings = app(ApplicationSettings::class);

        $currencyCode = $applicationSettings->getValue('app_currency');

        $currencyCode = $currencyCode ? $currencyCode : 'ILS';

        $formatter = new \NumberFormatter('en_US', \NumberFormatter::CURRENCY);

        $formattedCurrency = $formatter->formatCurrency(0, $currencyCode);

        $currencySign = mb_substr($formattedCurrency, 0, 1);

        return TextInput::make($name)
            ->numeric()
            ->suffix($currencySign)
            ->prefixIcon('heroicon-m-banknotes')
            ->prefixIconColor('danger')
            ->currencyMask(thousandSeparator: ',', decimalSeparator: '.', precision: 2);
    }
}
