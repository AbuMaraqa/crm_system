@php
    use Modules\Core\Services\Widgets\WidgetGroup;
    use Modules\Core\Services\Widgets\WidgetTab;use Modules\Core\Services\Widgets\WidgetTabs;
    /**
    * @var WidgetTab $tab
    */
@endphp

@foreach ($widgets->getItems() as $widget)

    @if($widget instanceof WidgetTabs)
        <x-filament::grid.column
            :default="$widget->getColumnSpan('default')"
            :sm="$widget->getColumnSpan('sm')"
            :md="$widget->getColumnSpan('md')"
            :lg="$widget->getColumnSpan('lg')"
            :xl="$widget->getColumnSpan('xl')"
            :two-xl="$widget->getColumnSpan('2xl')"
            class="fi-fo-component-ctn gap-6"
        >

            <div x-data="{ activeTab:  {{ $widget->getActiveTab() }} }">
                <div class="box box--stacked w-full">
                    <div class="flex items-start justify-start">
                        <ul
                            data-tw-merge
                            role="tablist"
                            class="p-0.5 border bg-slate-50/70 border-slate-200/70 rounded-lg dark:border-darkmode-400 w-full flex"
                        >
                            @foreach ($widget->getChildComponents() as $index=>$tab)
                                <li
                                    data-tw-merge
                                    role="presentation"
                                    class="focus-visible:outline-none flex-1"
                                >
                                    <button
                                        data-tw-merge
                                        role="tab"
                                        class="cursor-pointer block appearance-none px-3 py-2 border border-transparent text-slate-600 transition-colors dark:text-slate-400 [&amp;.active]:text-slate-700 [&amp;.active]:dark:text-white rounded-md py-1.5 dark:border-transparent [&amp;.active]:text-slate-700 [&amp;.active]:border [&amp;.active]:shadow-sm [&amp;.active]:font-medium [&amp;.active]:border-slate-200 [&amp;.active]:bg-white [&amp;.active]:dark:text-slate-300 [&amp;.active]:dark:bg-darkmode-400 [&amp;.active]:dark:border-darkmode-400 w-full py-2"
                                        @click="activeTab = {{ $index+1 }}"
                                        :class="{ 'active': activeTab === {{ $index+1 }} }"
                                    >
                                        @if(!$tab->isLabelHidden())
                                            <h4 class="font-bold">
                                                {{ $tab->getLabel() }}
                                            </h4>
                                        @endif
                                    </button>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="tab-content mt-5 p-5">
                    @foreach ($widget->getChildComponents() as $index=>$tab)
                        <div class="tab-pane leading-relaxed"
                             :class="{ 'active': activeTab === {{ $index+1 }} }"
                             x-show.transition.in.opacity.duration.600="activeTab === {{ $index+1 }}">

                            <x-filament::grid
                                :default="$tab->getColumns('default')"
                                :sm="$tab->getColumns('sm')"
                                :md="$tab->getColumns('md')"
                                :lg="$tab->getColumns('lg')"
                                :xl="$tab->getColumns('xl')"
                                :two-xl="$tab->getColumns('2xl')"
                                class="gap-6"
                            >
                                @foreach($tab->getChildComponents() as $widgetItem)
                                    @if ($widgetItem instanceof WidgetGroup)
                                        <x-core::others.widget-group-component :widgetGroup="$widgetItem" />
                                    @else
                                        <x-core::others.widget-item-component :widgetItem="$widgetItem" />
                                    @endif
                                @endforeach
                            </x-filament::grid>
                        </div>
                    @endforeach
                </div>
            </div>

        </x-filament::grid.column>
    @elseif ($widget instanceof WidgetGroup)
        <x-core::others.widget-group-component :widgetGroup="$widget" />
    @else
        <x-core::others.widget-item-component :widgetItem="$widget" />
    @endif
@endforeach
