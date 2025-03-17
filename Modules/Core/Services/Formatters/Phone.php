<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Services\Formatters;

use Illuminate\Support\Facades\Blade;
use illuminate\Support\Str;
use libphonenumber\PhoneNumberUtil;

class Phone extends Formatter
{
    public function getNationalFormattedPhone(): string
    {
        return phone($this->getState())->formatNational();
    }

    public function getInterNationalFormattedPhone(): string
    {
        return phone($this->getState())->formatInterNational();
    }

    public function getNationalPhone(): string
    {
        return PhoneNumberUtil::normalizeDiallableCharsOnly(phone($this->getState())->formatNational());
    }

    public function getInterNationalPhone(): string
    {
        // return phone($this->getNationalPhone(), $country)->__toString();
        return PhoneNumberUtil::normalizeDiallableCharsOnly(phone($this->getState())->formatInterNational());
    }

    public function renderAsHtml(): ?string
    {
        $formattedPhone = $this->getInterNationalFormattedPhone();
        $dialingPhone = $this->getInterNationalPhone();

        return Blade::render(
            <<<Html
                <x-filament::link dir='ltr'
                    icon="heroicon-m-phone"
                    href="tel:{$dialingPhone}">
                    <span class="font-normal text-black">{$formattedPhone}</span>
                </x-filament::link>
            Html
        );
    }

    public function renderAsTooltipHtml(): string
    {
        $formattedPhone = $this->getInterNationalFormattedPhone();
        $dialingPhone = $this->getInterNationalPhone();

        return Blade::render(
            <<<Html
                <x-filament::link href="tel:{$dialingPhone}" data-placement="top" dir='ltr' title="{$formattedPhone}" class="tooltip cursor-pointer flex items-center justify-center border rounded-full h-9 w-9 border-info/40 bg-info/10">
                     <i data-tw-merge="" class="stroke-[1] w-5 h-5">
                        @svg('iconoir-phone-outcome', 'w-5 h-5 text-info fill-info')
                    </i>
                </x-filament::link>
            Html
        );
    }

    public function renderWhatsUpAsHtml(): string
    {

        if (Str::contains($this->getState(), ['+972', '+970'])) {

            $PhonePS = phone('+970'.$this->getNationalPhone())->__toString();
            $PhoneIL = phone('+972'.$this->getNationalPhone())->__toString();

            $labelPS = __('WhatsApp +970');
            $labelIL = __('WhatsApp +972');

            return Blade::render(
                <<<Html
                <div class="flex flex-col gap-1">
                    <x-filament::link dir='ltr'
                        icon="ri-whatsapp-fill"
                        style='font-weight: inherit	!important'
                        href="https://wa.me/{$PhonePS}" target="_blank">
                        <span class="text-green-600 font-medium">
                            {$labelPS}
                        </span>
                    </x-filament::link>
                    <x-filament::link dir='ltr'
                        icon="ri-whatsapp-fill"
                        style='font-weight: inherit	!important'
                        href="https://wa.me/{$PhoneIL}" target="_blank">
                        <span class="text-green-600 font-medium">
                            {$labelIL}
                        </span>
                    </x-filament::link>

                </div>
            Html
            );
        } else {

            $dialingPhone = $this->getInterNationalPhone();
            $label = __('WhatsApp');

            return Blade::render(
                <<<Html
                <x-filament::link dir='ltr'
                    icon="ri-whatsapp-fill"
                    style='font-weight: inherit	!important'
                    href="https://wa.me/{$dialingPhone}" target="_blank">
                    <span class="text-green-600 font-medium">
                        {$label}
                    </span>
                </x-filament::link>
            Html
            );
        }
    }

    public function renderWhatsUpAsTooltipHtml(): string
    {
        if (Str::contains($this->getState(), ['+972', '+970'])) {

            $PhonePS = phone('+970'.$this->getNationalPhone())->__toString();
            $PhoneIL = phone('+972'.$this->getNationalPhone())->__toString();

            return Blade::render(
                <<<Html
                <div class="flex gap-2 ml-auto">
                    <x-filament::link dir='ltr'
                        href="https://wa.me/{$PhonePS}" target="_blank"
                        data-placement="top" title="{$PhonePS}" class="tooltip cursor-pointer flex items-center justify-center border rounded-full h-9 w-9 border-olive-drab-300 bg-olive-drab-100">
                        <i data-tw-merge="" class="stroke-[1] w-5 h-5">
                            @svg('ri-whatsapp-fill', 'w-5 h-5 text-olive-drab-600 fill-olive-drab-600')
                        </i>
                    </x-filament::link>

                    <x-filament::link dir='ltr'
                        href="https://wa.me/{$PhoneIL}" target="_blank"
                        data-placement="top" title="{$PhoneIL}" class="tooltip cursor-pointer flex items-center justify-center border rounded-full h-9 w-9 border-olive-drab-300 bg-olive-drab-100">
                        <i data-tw-merge="" class="stroke-[1] w-5 h-5">
                            @svg('ri-whatsapp-fill', 'w-5 h-5 text-olive-drab-600 fill-olive-drab-600')
                        </i>
                    </x-filament::link>
                </div>
            Html
            );
        } else {

            $dialingPhone = $this->getInterNationalPhone();

            return Blade::render(
                <<<Html
                    <x-filament::link dir='ltr'
                        href="https://wa.me/{$dialingPhone}" target="_blank"
                        data-placement="top" title="{$dialingPhone}" class="tooltip cursor-pointer flex items-center justify-center border rounded-full h-9 w-9 border-olive-drab-300 bg-olive-drab-100">
                        <i data-tw-merge="" class="stroke-[1] w-5 h-5">
                            @svg('ri-whatsapp-fill', 'w-5 h-5 text-olive-drab-600 fill-olive-drab-600')
                        </i>
                    </x-filament::link>
            Html
            );
        }
    }
}
