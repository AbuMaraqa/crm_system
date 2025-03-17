@php
    use Filament\Support\Enums\Alignment;
    use Filament\Support\Enums\VerticalAlignment;use Illuminate\Support\Arr;use function Filament\Support\get_color_css_variables;

    $color = $getColor() ?? 'gray';
    $isInline = $isInline();
@endphp

<x-filament-notifications::notification
    :notification="$notification"
    :x-transition:enter-start="
        Arr::toCssClasses([
            'opacity-0',
            ($this instanceof \Filament\Notifications\Livewire\Notifications)
            ? match (static::$alignment) {
                Alignment::Start, Alignment::Left => '-translate-x-12',
                Alignment::End, Alignment::Right => 'translate-x-12',
                Alignment::Center => match (static::$verticalAlignment) {
                    VerticalAlignment::Start => '-translate-y-12',
                    VerticalAlignment::End => 'translate-y-12',
                    default => null,
                },
            }
            : null,
        ])
    "
    :x-transition:leave-end="
        \Illuminate\Support\Arr::toCssClasses([
            'opacity-0',
            'scale-95' => ! $isInline,
        ])
    "
    @class([
        'fi-no-notification w-full overflow-hidden transition duration-300',
        ...match ($isInline) {
            true => [
                'fi-inline',
            ],
            false => [
                'max-w-sm rounded-xl bg-white shadow-lg ring-1 dark:bg-gray-900',
                match ($color) {
                    'gray' => 'fi-color-gray ring-gray-950/5 dark:ring-white/10',
                    default => 'fi-color-custom ring-custom-600/20 dark:ring-custom-400/30',
                },
            ],
        },
    ])
    @style([
        get_color_css_variables(
            $color,
            shades: [50, 400, 600],
        ) => ! ($isInline || $color === 'gray'),
    ])
>
    <div
        @class([
            'flex items-center rounded-xl px-3 py-2.5 hover:bg-slate-100/80 w-full',
            match ($color) {
                'gray' => null,
                default => 'bg-custom-50 dark:bg-custom-400/10',
            },
        ])
    >

        <div class="flex items-center w-full">
            <div>
                @if ($icon = $getIcon())
                    <div
                        class="flex items-center justify-center h-11 w-11 overflow-hidden rounded-full border-2 border-slate-200/70">
                        <x-filament-notifications::icon
                            :color="$getIconColor()"
                            :icon="$icon"
                            :size="$getIconSize()"
                        />
                    </div>
                @endif
            </div>

            <div class="sm:ml-5">
                @if (filled($title = $getTitle()))
                    <x-filament-notifications::title>
                        <div class="font-medium">
                            {{ str(__($title))->sanitizeHtml()->toHtmlString() }}
                        </div>
                    </x-filament-notifications::title>
                @endif

                @if (filled($body = $getBody()))
                    <x-filament-notifications::body class="mt-1">
                        <div class="mt-0.5 text-slate-500">
                            {{ str(__($body))->sanitizeHtml()->toHtmlString() }}
                        </div>
                    </x-filament-notifications::body>
                @endif

                @if (filled($date = $getDate()))
                    <x-filament-notifications::date class="mt-1">
                        <div class="mt-1.5 text-xs text-slate-500">
                            {{ $date }}
                        </div>
                    </x-filament-notifications::date>
                @endif

                @if ($actions = $getActions())
                    <x-core::notifications.actions
                        :actions="$actions"
                    />
                @endif
            </div>
        </div>

        <x-filament-notifications::close-button />
    </div>
</x-filament-notifications::notification>
