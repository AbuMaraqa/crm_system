<button
    {{ $getExtraAttributeBag()->merge([
        'style' => '--c-400:var(--primary-400);--c-500:var(--primary-500);--c-600:var(--primary-600);',
        'class' =>
            'fi-btn fi-btn-size-md relative grid-flow-col items-center justify-center font-semibold outline-none transition duration-75 focus:ring-2 rounded-lg fi-btn-color-primary gap-1.5 px-3 py-2 text-sm inline-grid shadow-sm bg-custom-600 text-white hover:bg-custom-500 dark:bg-custom-500 dark:hover:bg-custom-400 focus:ring-custom-500/50 dark:focus:ring-custom-400/50',
    ]) }}>
    <x-filament::loading-indicator class="h-5 w-5" wire:loading wite:target="save" />
    {{ $getLabel() }}
</button>
