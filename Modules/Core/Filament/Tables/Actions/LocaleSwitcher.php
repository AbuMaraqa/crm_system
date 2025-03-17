<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/2/24, 9:34 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Filament\Tables\Actions;

use Filament\Tables\Actions\SelectAction;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class LocaleSwitcher extends SelectAction
{
    protected function setUp(): void
    {
        parent::setUp();

        $allLocales    = LaravelLocalization::getSupportedLocales();
        $currentLocale = LaravelLocalization::getCurrentLocale();

        $options = [];
        foreach ($allLocales as $locale => $data) {
            $options[$locale] = $data['native'];
        }

        $this
            ->label(__('Language'))
            ->options($options);
    }

//    /**
//     * @param string|null $view
//     * @param array       $viewData
//     *
//     * @return $this
//     */
//    public function view(?string $view, array $viewData = []): static
//    {
//        $view = 'core::components.filament.tables.actions.select-action';
//        return parent::view($view, $viewData);
//    }
}
