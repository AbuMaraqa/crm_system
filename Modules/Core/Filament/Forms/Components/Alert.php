<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/2/24, 9:34 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Filament\Forms\Components;

use Filament\Forms\Components\Field;

class Alert extends Field
{
    protected string $view = 'core::components.filament.forms.components.alert';


    public string $type;
    public string $icon = 'clarity-info-standard-line';
    public string $message;

    public function type(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function message(string $message): static
    {
        $this->message = $message;

        return $this;
    }

    public function icon(string $icon): static
    {
        $this->icon = $icon;

        return $this;
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->afterStateHydrated(function ($state) {
            $this->state([
                'type'    => $this->type,
                'icon'    => $this->icon,
                'message' => $this->message,
            ]);
        });
    }
}
