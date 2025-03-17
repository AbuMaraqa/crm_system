<div>
    <p class="text-center text-lg font-bold text-primary-700 dark:text-primary-600"> {{ $getRecord()->name }}
    </p>
    <ul class="py-4 px-4 space-y-6">
        @foreach ($getRecord()->permissions->groupBy('module')->sortBy('module')->take(25) as $moduleName => $module)
            <li>
                <p class="mb-3 text-sm font-semibold text-black dark:text-white">@lang($moduleName)</p>
                <ul class="space-y-2 px-6">
                    @foreach ($module->groupBy('group')->sortBy('group')->take(5) as $groupName => $group)
                        <li class="flex items-center gap-x-2">
                            <span class="bg-primary-600 dark:bg-primary-700 rounded-full p-0.5">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-white" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>
                            <span
                                class="text-gray-800 dark:text-gray-200 text-xs font-semibold">@lang($groupName)</span>
                        </li>
                    @endforeach
                </ul>

                @if ($module->groupBy('group')->sortBy('group')->count() > 5)
            <li class="flex justify-center">
                @svg('heroicon-s-ellipsis-horizontal', 'w-5 h-5 text-gray-800 dark:text-gray-100')
            </li>
        @endif

        </li>
        @endforeach

        @if ($getRecord()->permissions->groupBy('module')->count() > 25)
            <li class="flex justify-center">
                @svg('heroicon-s-ellipsis-vertical', 'w-5 h-5 text-gray-800 dark:text-gray-100')
            </li>
        @endif


    </ul>
</div>
