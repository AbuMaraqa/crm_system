<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Livewire\Widgets;

use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Infolists\Concerns\InteractsWithInfolists;
use Filament\Infolists\Contracts\HasInfolists;
use Filament\Widgets\Widget;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Lazy;
use Modules\Core\Entities\Message;

#[Lazy]
class UserMessages extends Widget implements HasForms, HasInfolists
{
    use InteractsWithForms;
    use InteractsWithInfolists;

    protected int|string|array $columnSpan = 6;

    public int $messageID;

    #[Computed()]
    public function message(): Message
    {
        return auth()->user()
            ->messages()
            ->open()
            ->where('id', $this->messageID)
            ->first();
    }

    public function mount(int $messageID)
    {
        $this->messageID = $messageID;
    }

    public function render(): View
    {
        return view('core::livewire.widgets.user-messages');
    }
}
