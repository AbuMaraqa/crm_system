<div>
    @isset($jsPath)
        <script>
            {!! file_get_contents($jsPath) !!}
        </script>
    @endisset
    {{-- @isset($cssPath)
        <style>
            {!! file_get_contents($cssPath) !!}
        </style>
    @endisset --}}

    <div x-data="LivewireUIModal()" x-init="init()" x-on:close.stop="closeModalOnEscape()"
        x-on:keydown.escape.window="closeModalOnEscape()" x-show="show" class="fixed inset-0 z-50 overflow-y-auto"
        style="display: none;">
        <div class="flex items-center justify-center min-h-screen p-4 text-center">
            <div x-show="show" x-on:click="closeModalOnClickAway()" x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0" class="fixed inset-0 transition-all transform">
                <div class="absolute inset-0 transition bg-gray-900/75 dark:bg-gray-900/75"></div>
            </div>

            {{-- <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span> --}}

            <div x-show="show && showActiveComponent" x-trap.noscroll.inert="show && showActiveComponent"
                x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-bind:class="modalWidth"
                class="relative flex w-full flex-col bg-white
                shadow-xl ring-1 ring-gray-900/5 dark:bg-gray-900 dark:ring-white/10 rounded-xl max-w-4xl">

                <button
                    class="z-10 absolute top-5 md:top-5 ltr:right-5 rtl:left-5 md:ltr:right-9 md:rtl:left-9 text-gray-400 dark:text-gray-500
                    hover:text-gray-900 dark:hover:text-white
                    focus:text-gray-900 dark:focus:text-white
                    outline-none"
                    x-on:click="closeModalOnClickAway()">
                    @svg('heroicon-m-x-mark','w-6 h-6')

                </button>

                <div>
                    @forelse($components as $id => $component)
                        <div x-show.immediate="activeComponent == '{{ $id }}'" x-ref="{{ $id }}"
                            wire:key="{{ $id }}">
                            @livewire($component['name'], $component['attributes'], key($id))
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
