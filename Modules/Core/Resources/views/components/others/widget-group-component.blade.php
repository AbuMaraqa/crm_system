<x-filament::grid.column
    :default="$widgetGroup->getColumnSpan('default')"
    :sm="$widgetGroup->getColumnSpan('sm')"
    :md="$widgetGroup->getColumnSpan('md')"
    :lg="$widgetGroup->getColumnSpan('lg')"
    :xl="$widgetGroup->getColumnSpan('xl')"
    :two-xl="$widgetGroup->getColumnSpan('2xl')"
    class="fi-fo-component-ctn gap-6"
>
    @if(!$widgetGroup->isNameHidden())
        <h4 class="pb-3 text-base font-bold text-primary-600 dark:text-primary-500">{{$widgetGroup->getName()}}</h4>
    @endif

    <x-filament::grid
        :default="$widgetGroup->getColumns('default')"
        :sm="$widgetGroup->getColumns('sm')"
        :md="$widgetGroup->getColumns('md')"
        :lg="$widgetGroup->getColumns('lg')"
        :xl="$widgetGroup->getColumns('xl')"
        :two-xl="$widgetGroup->getColumns('2xl')"
        class="gap-2"
    >

        @foreach ($widgetGroup->getItems() as $item)
            <x-filament::grid.column
                :default="$item->getColumnSpan('default')"
                :sm="$item->getColumnSpan('sm')"
                :md="$item->getColumnSpan('md')"
                :lg="$item->getColumnSpan('lg')"
                :xl="$item->getColumnSpan('xl')"
                :two-xl="$item->getColumnSpan('2xl')"
                class="fi-fo-component-ctn gap-6"
            >

                @livewire($item->getLivewirePath())

            </x-filament::grid.column>

        @endforeach


    </x-filament::grid>

</x-filament::grid.column>
