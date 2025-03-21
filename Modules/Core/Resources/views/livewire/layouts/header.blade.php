@php
    use function Filament\Support\generate_href_html;
    $unreadNotificationsCount = $this->getUnreadNotificationsCount();
@endphp

<nav class="header before:bg-white dark:before:bg-navy-750 print:hidden">
    <!-- App Header  -->
    <div
        class="header-container relative flex w-full bg-white dark:bg-navy-700 print:hidden"
    >
        <!-- Header Items -->
        <div class="flex w-full items-center justify-between">
            <!-- Left: Sidebar Toggle Button -->
            <div class="h-7 w-7">
                <button
                    class="menu-toggle ml-0.5 flex h-7 w-7 flex-col justify-center space-y-1.5 text-primary outline-none focus:outline-none dark:text-accent-light/80"
                    :class="$store.global.isSidebarExpanded && 'active'"
                    @click="$store.global.isSidebarExpanded = !$store.global.isSidebarExpanded"
                >
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>

            <!-- Right: Header buttons -->
            <div class="-mr-1.5 flex items-center space-x-2">
                <!-- Language Selector -->
                <div
                    x-effect="if($store.global.isSearchbarActive) isShowPopper = false"
                    x-data="usePopper({placement:'bottom-end',offset:12})"
                    @click.outside="isShowPopper && (isShowPopper = false)"
                    class="flex"
                >
                    <button
                        @click="isShowPopper = !isShowPopper"
                        {{--                        x-ref="popperRef"--}}
                        class="btn relative size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
                    >
                        <span class="avatar size-8">
                            <span
                                class="is-initial rounded-full bg-slate-200 text-base uppercase text-slate-600 dark:bg-navy-500 dark:text-navy-100"
                            >
                                <img
                                    src="{{ asset('images/flags/'.strtolower(config('app.available_locales')[app()->getLocale()]['regional']).'.svg') }}"
                                    alt="{{ config('app.available_locales')[app()->getLocale()]['name'] }}" class="w-6 h-6 rounded-full">
                            </span>
                        </span>
                    </button>

                    <div wire:ignore
                        :class="isShowPopper && 'show'"
                        class="popper-root top-[50px]"
                        x-ref="popperRoot"
                    >
                        <div
                            class="popper-box mx-4 mt-1 flex max-h-[calc(100vh-6rem)] flex-col rounded-lg border border-slate-150 bg-white shadow-soft dark:border-navy-800 dark:bg-navy-700 dark:shadow-soft-dark sm:m-0">
                            <div class="tab-content flex flex-col overflow-hidden">
                                <div
                                    x-transition:enter="transition-all duration-300 easy-in-out"
                                    x-transition:enter-start="opacity-0 [transform:translate3d(1rem,0,0)]"
                                    x-transition:enter-end="opacity-100 [transform:translate3d(0,0,0)]"
                                    class="is-scrollbar-hidden space-y-4 overflow-y-auto px-4 py-2"
                                >
                                    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                        <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                                           hreflang="{{ $localeCode }}"
                                           class="flex items-center space-x-3 hover:bg-gray-100 hover:text-gray-900"
                                           role="menuitem" tabindex="-1" id="options-menu-item-{{ $localeCode }}">
                                            <div
                                                class="flex size-8 shrink-0 items-center justify-center rounded-lg bg-slate-150 dark:bg-slate-150">
                                                <img
                                                    src="{{ asset('images/flags/'.strtolower($properties['regional']).'.svg') }}"
                                                    alt="{{ $properties['name'] }}" class="w-6 h-6 rounded">
                                            </div>
                                            <div>
                                                <p class="font-medium text-slate-600 dark:text-navy-100">
                                                    {{ $properties['native'] }}
                                                </p>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Dark Mode Toggle -->
                <button
                    @click="$store.global.isDarkModeEnabled = !$store.global.isDarkModeEnabled"
                    class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
                >
                    <svg
                        x-show="$store.global.isDarkModeEnabled"
                        x-transition:enter="transition-transform duration-200 ease-out absolute origin-top"
                        x-transition:enter-start="scale-75"
                        x-transition:enter-end="scale-100 static"
                        class="size-6 text-amber-400"
                        fill="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            d="M11.75 3.412a.818.818 0 01-.07.917 6.332 6.332 0 00-1.4 3.971c0 3.564 2.98 6.494 6.706 6.494a6.86 6.86 0 002.856-.617.818.818 0 011.1 1.047C19.593 18.614 16.218 21 12.283 21 7.18 21 3 16.973 3 11.956c0-4.563 3.46-8.31 7.925-8.948a.818.818 0 01.826.404z"
                        />
                    </svg>
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        x-show="!$store.global.isDarkModeEnabled"
                        x-transition:enter="transition-transform duration-200 ease-out absolute origin-top"
                        x-transition:enter-start="scale-75"
                        x-transition:enter-end="scale-100 static"
                        class="size-6 text-amber-400"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                            clip-rule="evenodd"
                        />
                    </svg>
                </button>

                <!-- Monochrome Mode Toggle -->
                <button
                    @click="$store.global.isMonochromeModeEnabled = !$store.global.isMonochromeModeEnabled"
                    class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
                >
                    <i
                        class="fa-solid fa-palette bg-gradient-to-r from-sky-400 to-blue-600 bg-clip-text text-lg font-semibold text-transparent"
                    ></i>
                </button>

                <!-- Notification-->

                <a class="p-2 text-white rounded-full hover:bg-white/5 relative cursor-pointer"
                   @if ($pollingInterval = $this->getPollingInterval()) wire:poll.{{ $pollingInterval }} @endif
                   x-on:click="$dispatch('open-modal', { id: 'database-notifications' })" aria-label="Notifications">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="size-5 text-slate-500 dark:text-navy-100"
                        stroke="currentColor"
                        fill="none"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1.5"
                            d="M15.375 17.556h-6.75m6.75 0H21l-1.58-1.562a2.254 2.254 0 01-.67-1.596v-3.51a6.612 6.612 0 00-1.238-3.85 6.744 6.744 0 00-3.262-2.437v-.379c0-.59-.237-1.154-.659-1.571A2.265 2.265 0 0012 2c-.597 0-1.169.234-1.591.65a2.208 2.208 0 00-.659 1.572v.38c-2.621.915-4.5 3.385-4.5 6.287v3.51c0 .598-.24 1.172-.67 1.595L3 17.556h12.375zm0 0v1.11c0 .885-.356 1.733-.989 2.358A3.397 3.397 0 0112 22a3.397 3.397 0 01-2.386-.976 3.313 3.313 0 01-.989-2.357v-1.111h6.75z"
                        />
                    </svg>

                    @if ($unreadNotificationsCount > 0)
                        <span
                            class="absolute -top-px -right-px flex size-3 items-center justify-center"
                        >
                            <span
                                class="absolute inline-flex h-full w-full animate-ping rounded-full bg-secondary opacity-80"
                            ></span>
                            <span
                                class="inline-flex size-2 rounded-full bg-secondary"
                            ></span>
                        </span>

{{--                        <div--}}
{{--                            class="absolute -right-3 -top-1.5 -mr-1.5 -mt-1.5 flex items-center justify-center rounded-full bg-white text-xs font-medium w-max-content">--}}
{{--                            <div class="h-full w-full rounded-full border border-danger/50 bg-danger/70 px-1.5 text-white/90">--}}
{{--                                {{ $unreadNotificationsCount }}--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    @endif
                </a>

                <!-- Right Sidebar Toggle -->
            </div>
        </div>
    </div>
</nav>
