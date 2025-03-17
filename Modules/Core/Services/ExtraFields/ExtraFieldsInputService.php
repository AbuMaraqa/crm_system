<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Services\ExtraFields;

use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Ysfkaya\FilamentPhoneInput\Forms\PhoneInput;

class ExtraFieldsInputService
{
    public static function make(string $name): Builder
    {
        return Builder::make($name)
            ->blocks([
                Block::make('link')
                    ->label(__('Link'))
                    ->icon('heroicon-m-link')
                    ->schema([
                        TextInput::make('title')
                            ->label(__('Title'))
                            ->required(),
                        TextInput::make('value')
                            ->label(__('Value'))
                            ->url()
                            ->required(),
                    ])
                    ->columns([
                        'default' => 1,
                        'md' => 2,
                    ]),

                Block::make('number')
                    ->label(__('Number'))
                    ->icon('heroicon-m-hashtag')
                    ->schema([
                        TextInput::make('title')
                            ->label(__('Title'))
                            ->required(),
                        TextInput::make('value')
                            ->label(__('Value'))
                            ->numeric()
                            ->required(),
                    ])
                    ->columns([
                        'default' => 1,
                        'md' => 2,
                    ]),

                Block::make('email')
                    ->label(__('Email'))
                    ->icon('heroicon-m-at-symbol')
                    ->schema([
                        TextInput::make('title')
                            ->label(__('Title'))
                            ->required(),
                        TextInput::make('value')
                            ->label(__('Value'))
                            ->email()
                            ->required(),
                    ])
                    ->columns([
                        'default' => 1,
                        'md' => 2,
                    ]),

                Block::make('text')
                    ->label(__('Text'))
                    ->icon('heroicon-m-bars-2')
                    ->schema([
                        TextInput::make('title')
                            ->label(__('Title'))
                            ->required(),
                        TextInput::make('value')
                            ->label(__('Value'))
                            ->string()
                            ->required(),
                    ])
                    ->columns([
                        'default' => 1,
                        'md' => 2,
                    ]),

                Block::make('textarea')
                    ->label(__('Textarea'))
                    ->icon('heroicon-m-bars-3-bottom-left')
                    ->schema([
                        TextInput::make('title')
                            ->label(__('Title'))
                            ->required(),
                        Textarea::make('value')
                            ->label(__('Value'))
                            ->cols(3)
                            ->string()
                            ->required(),
                    ])
                    ->columns([
                        'default' => 1,
                        'md' => 2,
                    ]),

                Block::make('phone')
                    ->label(__('Phone'))
                    ->icon('heroicon-m-phone')
                    ->schema([
                        TextInput::make('title')
                            ->label(__('Title'))
                            ->required(),
                        PhoneInput::make('value')
                            ->label(__('Value'))
                            ->required(),

                    ])
                    ->columns([
                        'default' => 1,
                        'md' => 2,
                    ]),
            ]);
    }
}
