<x-filament::grid.column
    :default="$widgetItem->getColumnSpan('default')"
    :sm="$widgetItem->getColumnSpan('sm')"
    :md="$widgetItem->getColumnSpan('md')"
    :lg="$widgetItem->getColumnSpan('lg')"
    :xl="$widgetItem->getColumnSpan('xl')"
    :two-xl="$widgetItem->getColumnSpan('2xl')"
    class="fi-fo-component-ctn gap-6"
>

    @livewire($widgetItem->getLivewirePath())

</x-filament::grid.column>
