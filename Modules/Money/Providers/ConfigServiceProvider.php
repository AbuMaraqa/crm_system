<?php

namespace Modules\Money\Providers;

use Closure;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\TextEntry;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\ServiceProvider;
use Modules\Core\Services\Settings\ApplicationSettings;
use Modules\Money\Services\Formatters\Money;

class ConfigServiceProvider extends ServiceProvider
{
    public function boot()
    {
        TextInput::macro('money', function (): static {

            $applicationSettings = app(ApplicationSettings::class);

            $currencyCode = $applicationSettings->getValue('app_currency');

            $currencyCode = $currencyCode ? $currencyCode : 'ILS';

            $formatter = new \NumberFormatter('en_US', \NumberFormatter::CURRENCY);

            $formattedCurrency = $formatter->formatCurrency(0, $currencyCode);

            $currencySign = mb_substr($formattedCurrency, 0, 1);

            $this
                ->numeric()
                ->minValue(0)
                ->suffix($currencySign)
                ->prefixIcon('heroicon-m-banknotes')
                ->currencyMask(thousandSeparator: ',', decimalSeparator: '.', precision: 2);

            return $this;
        });

        TextEntry::macro('moneyFormat', function (bool|Closure $condition = true): static {

            $this->formatStateUsing(function (null|float|string $state) use ($condition) {
                if ((bool) $this->evaluate($condition, [
                    'state' => $state,
                ])) {

                    if (is_numeric($state)) {
                        return Money::make()->state($state)->renderAsHtml();
                    }

                    if (is_string($state)) {
                        return $state;
                    }

                    return __('Not Available');
                }
            });

            return $this;
        });

        TextColumn::macro('moneyFormat', function (bool|Closure $condition = true): static {

            $this->formatStateUsing(function (null|float|string $state) use ($condition) {
                if ((bool) $this->evaluate($condition, [
                    'state' => $state,
                ])) {

                    if (is_numeric($state)) {
                        return Money::make()->state($state)->renderAsHtml();
                    }

                    if (is_string($state)) {
                        return $state;
                    }

                    return __('Not Available');
                }
            });

            return $this;
        });
    }
}
