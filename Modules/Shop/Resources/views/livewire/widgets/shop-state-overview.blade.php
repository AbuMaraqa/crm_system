<div class="col-span-12">
    <div class="mt-3.5 grid grid-cols-12 gap-5">
        @foreach($widgets as $widget)
            @if($widget['visible'])
                <a href="{{ $widget['link'] }}"
                   class="rounded-lg bg-slate-150 dark:bg-navy-700 h-full cursor-pointer xl:col-span-4 lg:col-span-6 md:col-span-6 sm:col-span-6 col-span-12">

                    <div class="overflow-hidden relative p-6">
                        <div class="flex items-center">
                            <div
                                class="flex min-h-14 min-w-14 items-center justify-center rounded-lg border-0 {{ $widget['icon_parent_class'] }}">
                                <i data-tw-merge="" class="h-8 w-8">
                                    {{ svg($widget['icon'], $widget['icon_class']) }}
                                </i>
                            </div>

                            <div class="ml-4">
                                <div class="text-base font-medium">
                                    {{ $widget['title'] }}
                                </div>
                                <div class="mb-0 text-2xl font-semibold text-gray-800 dark:text-white">
                                    {{ $widget['value'] }}
                                </div>
                                @if(isset($widget['subtitle']))
                                    <span class="text-xs text-gray-500 dark:text-white/70">
                                        {{ $widget['subtitle'] }}
                                    </span>
                                @endif
                            </div>
                        </div>

{{--                        <div class="absolute ltr:-right-16 rtl:-left-16 -top-16">--}}
{{--                            <div--}}
{{--                                class="{{ $widget['shapes_class'] }} opacity-10 w-36 h-36 rounded-full shadow-lg"></div>--}}
{{--                        </div>--}}

{{--                        <div class="absolute ltr:-right-4 rtl:-left-4 -top-24">--}}
{{--                            <div--}}
{{--                                class="{{ $widget['shapes_class'] }} opacity-10 w-36 h-36 rounded-full shadow-lg"></div>--}}
{{--                        </div>--}}
                    </div>
                </a>
            @endif
        @endforeach
    </div>
</div>
