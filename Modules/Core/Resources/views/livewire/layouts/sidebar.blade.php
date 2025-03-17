@php use Modules\Core\Services\Sidebar\SidebarGroup;use Modules\Core\Services\Sidebar\SidebarSection;use function Filament\Support\generate_href_html; @endphp
<div class="sidebar print:hidden">
    <!-- Main Sidebar -->
    <div class="main-sidebar">
        <div
            class="flex h-full w-full flex-col items-center justify-between border-r border-navy-700 bg-navy-800"
        >
            <!-- Application Logo -->
            <div class="flex pt-4">
                <a {{ generate_href_html(route('dashboard.home')) }}>
                    @if ($faviconUrl)
                        <img
                            class="size-11 transition-transform duration-500 ease-in-out hover:rotate-[360deg]"
                            src="{{ $faviconUrl }}"
                            alt="{{ __('Logo') }}"
                        />
                    @else
                        <p class="text-sm tracking-wider text-slate-800 dark:text-navy-100">
                            {{ config('app.name') }}
                        </p>
                    @endif
                </a>
            </div>

            <!-- Main Sections Links -->
            <div
                class="is-scrollbar-hidden flex flex-col space-y-4 overflow-y-auto pt-6"
            >
                <!-- Dashobards -->
                <a
                    href="{{ route('dashboard.home') }}"
                    class="flex size-11 items-center justify-center rounded-lg bg-primary/10 text-accent-light outline-none transition-colors duration-200 hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:bg-navy-600 dark:text-accent-light dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90"
                    x-tooltip.placement.right="'{{ __('Dashboard') }}'"
                >
                    <svg
                        class="h-7 w-7"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                    >
                        <path
                            fill="currentColor"
                            fill-opacity=".3"
                            d="M5 14.059c0-1.01 0-1.514.222-1.945.221-.43.632-.724 1.453-1.31l4.163-2.974c.56-.4.842-.601 1.162-.601.32 0 .601.2 1.162.601l4.163 2.974c.821.586 1.232.88 1.453 1.31.222.43.222.935.222 1.945V19c0 .943 0 1.414-.293 1.707C18.414 21 17.943 21 17 21H7c-.943 0-1.414 0-1.707-.293C5 20.414 5 19.943 5 19v-4.94Z"
                        />
                        <path
                            fill="currentColor"
                            d="M3 12.387c0 .267 0 .4.084.441.084.041.19-.04.4-.204l7.288-5.669c.59-.459.885-.688 1.228-.688.343 0 .638.23 1.228.688l7.288 5.669c.21.163.316.245.4.204.084-.04.084-.174.084-.441v-.409c0-.48 0-.72-.102-.928-.101-.208-.291-.355-.67-.65l-7-5.445c-.59-.459-.885-.688-1.228-.688-.343 0-.638.23-1.228.688l-7 5.445c-.379.295-.569.442-.67.65-.102.208-.102.448-.102.928v.409Z"
                        />
                        <path
                            fill="currentColor"
                            d="M11.5 15.5h1A1.5 1.5 0 0 1 14 17v3.5h-4V17a1.5 1.5 0 0 1 1.5-1.5Z"
                        />
                        <path
                            fill="currentColor"
                            d="M17.5 5h-1a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5Z"
                        />
                    </svg>
                </a>

                <!-- Apps -->
                <a
                    href="{{ route('frontside.homepage') }}" target="_blank"
                    class="flex size-11 items-center justify-center text-slate-200 rounded-lg outline-none transition-colors duration-200 hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
                    x-tooltip.placement.right="'{{ __('Visit Site') }}'"
                >
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 16C2 16.6 2.4 17 3 17H21C21.6 17 22 16.6 22 16V15H2V16Z" fill="currentColor" />
                        <path opacity="0.3" d="M21 3H3C2.4 3 2 3.4 2 4V15H22V4C22 3.4 21.6 3 21 3Z"
                              fill="currentColor" />
                        <path opacity="0.3" d="M15 17H9V20H15V17Z" fill="currentColor" />
                    </svg>

                </a>
            </div>

            <!-- Bottom Links -->
            <div class="flex flex-col items-center space-y-3 py-3">
                <!-- Settings -->
                <a {{ generate_href_html(route('dashboard.settings.general')) }}
                   class="flex size-11 items-center justify-center text-slate-200 rounded-lg outline-none transition-colors duration-200 hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
                >
                    <svg
                        class="h-7 w-7"
                        viewBox="0 0 24 24"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            fill-opacity="0.3"
                            fill="currentColor"
                            d="M2 12.947v-1.771c0-1.047.85-1.913 1.899-1.913 1.81 0 2.549-1.288 1.64-2.868a1.919 1.919 0 0 1 .699-2.607l1.729-.996c.79-.474 1.81-.192 2.279.603l.11.192c.9 1.58 2.379 1.58 3.288 0l.11-.192c.47-.795 1.49-1.077 2.279-.603l1.73.996a1.92 1.92 0 0 1 .699 2.607c-.91 1.58-.17 2.868 1.639 2.868 1.04 0 1.899.856 1.899 1.912v1.772c0 1.047-.85 1.912-1.9 1.912-1.808 0-2.548 1.288-1.638 2.869.52.915.21 2.083-.7 2.606l-1.729.997c-.79.473-1.81.191-2.279-.604l-.11-.191c-.9-1.58-2.379-1.58-3.288 0l-.11.19c-.47.796-1.49 1.078-2.279.605l-1.73-.997a1.919 1.919 0 0 1-.699-2.606c.91-1.58.17-2.869-1.639-2.869A1.911 1.911 0 0 1 2 12.947Z"
                        />
                        <path
                            fill="currentColor"
                            d="M11.995 15.332c1.794 0 3.248-1.464 3.248-3.27 0-1.807-1.454-3.272-3.248-3.272-1.794 0-3.248 1.465-3.248 3.271 0 1.807 1.454 3.271 3.248 3.271Z"
                        />
                    </svg>
                </a>

                <!-- Profile -->
                <div
                    x-data="usePopper({placement:'right-end',offset:12})"
                    @click.outside="isShowPopper && (isShowPopper = false)"
                    class="flex"
                >
                    <button
                        @click="isShowPopper = !isShowPopper"
                        x-ref="popperRef"
                        class="avatar size-12"
                    >

                        <img
                            class="mask is-squircle"
                            src="{{ $this->user->getAvatarUrl('avatar-lg') }}"
                            alt="avatar"
                        />
                        <span
                            class="absolute right-0 size-3.5 rounded-full border-2 border-white bg-success dark:border-navy-700"
                        ></span>
                    </button>

                    <div
                        :class="isShowPopper && 'show'"
                        class="popper-root fixed"
                        x-ref="popperRoot"
                    >
                        <div
                            class="popper-box w-64 rounded-lg border border-slate-150 bg-white shadow-soft dark:border-navy-600 dark:bg-navy-700"
                        >
                            <div
                                class="flex items-center space-x-4 rounded-t-lg bg-slate-100 py-5 px-4 dark:bg-navy-800"
                            >
                                <div class="avatar size-14">
                                    <img
                                        class="mask is-squircle"
                                        src="{{ $this->user->getAvatarUrl('avatar-lg') }}"
                                        alt="avatar"
                                    />
                                </div>
                                <div>
                                    <a
                                        href="#"
                                        class="text-base font-medium text-slate-700 hover:text-primary focus:text-primary dark:text-navy-100 dark:hover:text-accent-light dark:focus:text-accent-light"
                                    >
                                        {{ $this->user->name }}
                                    </a>
                                    <p class="text-xs text-slate-400 dark:text-navy-300">
                                        {{ $this->user->email }}
                                    </p>
                                </div>
                            </div>
                            <div class="flex flex-col pt-2 pb-5">
                                @if (app('impersonate')->isImpersonating())
                                    <button wire:click="impersonateLeave()"
                                            class="group flex items-center space-x-3 py-2 px-4 tracking-wide outline-none transition-all hover:bg-slate-100 focus:bg-slate-100 dark:hover:bg-navy-600 dark:focus:bg-navy-600 w-full"
                                    >
                                        <div
                                            class="flex size-8 items-center justify-center rounded-lg bg-info text-white min-w-8 min-h-8"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="size-4.5"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                                stroke-width="2"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"
                                                />
                                            </svg>
                                        </div>

                                        <div class="text-start">
                                            <h2
                                                class="font-medium text-slate-700 transition-colors group-hover:text-primary group-focus:text-primary dark:text-navy-100 dark:group-hover:text-accent-light dark:group-focus:text-accent-light"
                                            >
                                                {{ __('Leave User') }}
                                            </h2>
                                            <div
                                                class="text-xs text-slate-400 line-clamp-1 dark:text-navy-300"
                                            >
                                                {{ __('Leave the user and return to your account') }}
                                            </div>
                                        </div>
                                    </button>
                                @endif

                                @if ($this->user->roles?->count() > 1)
                                    <div x-data="{showModal:false}">
                                        <button
                                            @click="showModal = true"
                                            class="group flex items-center space-x-3 py-2 px-4 tracking-wide outline-none transition-all hover:bg-slate-100 focus:bg-slate-100 dark:hover:bg-navy-600 dark:focus:bg-navy-600 w-full"
                                        >
                                            <div
                                                class="flex size-8 items-center justify-center rounded-lg bg-secondary text-white min-w-8 min-h-8"
                                            >
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="size-4.5"
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke="currentColor"
                                                    stroke-width="2"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"
                                                    />
                                                </svg>
                                            </div>

                                            <div class="text-start">
                                                <h2
                                                    class="font-medium text-slate-700 transition-colors group-hover:text-primary group-focus:text-primary dark:text-navy-100 dark:group-hover:text-accent-light dark:group-focus:text-accent-light"
                                                >
                                                    {{ __('Switch Role') }}
                                                </h2>
                                                <div
                                                    class="text-xs text-slate-400 line-clamp-1 dark:text-navy-300"
                                                >
                                                    {{ __('Switch to another role') }}
                                                </div>
                                            </div>
                                        </button>

                                        <template x-teleport="#x-teleport-target">
                                            <div
                                                class="fixed inset-0 z-[100] flex flex-col items-center justify-center overflow-hidden px-4 py-6 sm:px-5"
                                                x-show="showModal"
                                                role="dialog"
                                                @keydown.window.escape="showModal = false"
                                            >
                                                <div
                                                    class="absolute inset-0 bg-slate-900/60 backdrop-blur transition-opacity duration-300"
                                                    @click="showModal = false"
                                                    x-show="showModal"
                                                    x-transition:enter="ease-out"
                                                    x-transition:enter-start="opacity-0"
                                                    x-transition:enter-end="opacity-100"
                                                    x-transition:leave="ease-in"
                                                    x-transition:leave-start="opacity-100"
                                                    x-transition:leave-end="opacity-0"
                                                ></div>
                                                <div
                                                    class="relative max-w-lg rounded-lg bg-white px-4 py-10 text-center transition-opacity duration-300 dark:bg-navy-700 sm:px-5"
                                                    x-show="showModal"
                                                    x-transition:enter="ease-out"
                                                    x-transition:enter-start="opacity-0"
                                                    x-transition:enter-end="opacity-100"
                                                    x-transition:leave="ease-in"
                                                    x-transition:leave-start="opacity-100"
                                                    x-transition:leave-end="opacity-0"
                                                >
                                                    <div class="card">
                                                        <div
                                                            class="border-b border-slate-200 p-4 dark:border-navy-500 sm:px-5"
                                                        >
                                                            <h2
                                                                class="font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100 lg:text-base"
                                                            >
                                                                {{ __('Switch Role') }}
                                                            </h2>
                                                        </div>
                                                        <div class="p-4 sm:px-5">
                                                            <ul class="space-y-1.5 font-inter font-medium">
                                                                @if ($this->user->roles?->count() > 1)
                                                                    @foreach ($this->user->roles as $role)
                                                                        <li>
                                                                            <button
                                                                                @class([
                                                                                    'flex items-center space-x-2 rounded-full bg-primary px-5 py-2.5 tracking-wide text-white outline-none transition-all dark:bg-accent',
                                                                                    $role->id === $this->user->currentRole->id=>'group flex space-x-2 rounded-full px-5 py-2.5 tracking-wide outline-none transition-all hover:bg-primary/10 hover:text-primary focus:bg-primary/10 focus:text-primary dark:hover:bg-accent-light/15 dark:hover:text-accent-light dark:focus:bg-accent-light/15 dark:focus:text-accent-light'
                                                                                ])
                                                                                wire:click="switchRole({{ $role->id }})"
                                                                            >
                                                                                <svg
                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                    class="size-5 text-slate-400 transition-colors group-hover:text-primary group-focus:text-primary dark:text-navy-300 dark:group-hover:text-accent dark:group-focus:text-accent"
                                                                                    fill="none"
                                                                                    viewBox="0 0 24 24"
                                                                                    stroke="currentColor"
                                                                                >
                                                                                    <path
                                                                                        d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"
                                                                                    />
                                                                                    <path
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round"
                                                                                        stroke-width="1.5"
                                                                                        d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"
                                                                                    />
                                                                                </svg>

                                                                                <span>
                                                                                    {{ $role->name }}
                                                                                </span>
                                                                            </button>
                                                                        </li>
                                                                    @endforeach
                                                                @endif
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </template>
                                    </div>

                                @endif

                                <a {{ generate_href_html(route('dashboard.account.profile')) }}
                                   class="group flex items-center space-x-3 py-2 px-4 tracking-wide outline-none transition-all hover:bg-slate-100 focus:bg-slate-100 dark:hover:bg-navy-600 dark:focus:bg-navy-600"
                                >
                                    <div
                                        class="flex size-8 items-center justify-center rounded-lg bg-warning text-white min-w-8 min-h-8"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="size-4.5"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            stroke-width="2"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                                            />
                                        </svg>
                                    </div>

                                    <div>
                                        <h2
                                            class="font-medium text-slate-700 transition-colors group-hover:text-primary group-focus:text-primary dark:text-navy-100 dark:group-hover:text-accent-light dark:group-focus:text-accent-light"
                                        >
                                            {{ __('Profile Info') }}
                                        </h2>
                                        <div
                                            class="text-xs text-slate-400 line-clamp-1 dark:text-navy-300"
                                        >
                                            {{ __('Update your profile details') }}
                                        </div>
                                    </div>
                                </a>

                                <a {{ generate_href_html(route('dashboard.account.change_password')) }}
                                   class="group flex items-center space-x-3 py-2 px-4 tracking-wide outline-none transition-all hover:bg-slate-100 focus:bg-slate-100 dark:hover:bg-navy-600 dark:focus:bg-navy-600"
                                >
                                    <div
                                        class="flex size-8 items-center justify-center rounded-lg bg-success text-white min-w-8 min-h-8"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="size-4.5"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            stroke-width="2"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"
                                            />
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                                            />
                                        </svg>
                                    </div>

                                    <div>
                                        <h2
                                            class="font-medium text-slate-700 transition-colors group-hover:text-primary group-focus:text-primary dark:text-navy-100 dark:group-hover:text-accent-light dark:group-focus:text-accent-light"
                                        >
                                            {{ __('Change Password') }}
                                        </h2>
                                        <div
                                            class="text-xs text-slate-400 line-clamp-1 dark:text-navy-300"
                                        >
                                            {{ __('Change your account password') }}
                                        </div>
                                    </div>
                                </a>

                                <div class="mt-3 px-4">
                                    <button wire:click="logout"
                                            class="btn h-9 w-full space-x-2 bg-primary text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="size-5"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="1.5"
                                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"
                                            />
                                        </svg>
                                        <span>
                                            {{ __('Logout') }}
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sidebar Panel -->
    <div class="sidebar-panel">
        <div
            class="flex h-full grow flex-col bg-[#2d374b] text-white pl-[var(--main-sidebar-width)] dark:bg-navy-750"
        >
            <!-- Sidebar Panel Header -->
            <div
                class="flex h-18 w-full items-center justify-between pl-4 pr-1"
            >
                <p
                    class="text-base tracking-wider text-white dark:text-navy-100"
                >
                    {{ __('MAIN MENU') }}
                </p>

{{--                <a {{ generate_href_html(route('dashboard.home')) }}>--}}
{{--                    @if ($logoUrl)--}}
{{--                        <img--}}
{{--                            class="transition-transform duration-500 ease-in-out"--}}
{{--                            src="{{ $logoUrl }}"--}}
{{--                            alt="{{ __('Logo') }}"--}}
{{--                        />--}}
{{--                    @else--}}
{{--                        <p class="text-sm tracking-wider text-slate-800 dark:text-navy-100">--}}
{{--                            {{ config('app.name') }}--}}
{{--                        </p>--}}
{{--                    @endif--}}
{{--                </a>--}}
                <button
                    @click="$store.global.isSidebarExpanded = false"
                    class="btn h-7 w-7 rounded-full p-0 text-primary hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-accent-light/80 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 xl:hidden"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="size-6"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M15 19l-7-7 7-7"
                        />
                    </svg>
                </button>
            </div>

            <!-- Sidebar Panel Body -->
            <div
                x-data="{expandedItem:'menu-item-3'}"
                class="h-[calc(100%-4.5rem)] overflow-x-hidden pb-6"
                x-init="$el._x_simplebar = new SimpleBar($el);"
            >

                <ul class="flex flex-1 flex-col px-4 font-inter">
                    @foreach ($sidebar->getItems() as $sidebarItem)
                        @canany($sidebarItem->getPermissions())
                            @if ($sidebarItem instanceof SidebarGroup)
                                <li x-data="accordionItem('menu-item-{{ $sidebarItem->getKeyName() }}')">
                                    <a
                                        :class="expanded ? 'font-medium text-primary dark:text-accent-light' : ''"
                                        @click="expanded = !expanded"
                                        class="flex items-center justify-between py-2 text-[0.8rem] tracking-wide outline-none transition-colors duration-200 ease-in-out rounded-lg hover:text-primary dark:hover:text-navy-300"
                                        href="javascript:void(0);"
                                    >
                                        <span class="flex items-center justify-start">
                                            @if (!empty($sidebarItem->getIcon()))
                                                <i :class="expanded ? 'flex size-8 me-2 items-center justify-center rounded-lg bg-primary/10 text-primary outline-none transition-colors duration-200 hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:bg-navy-600 dark:text-accent-light dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90' : 'flex size-8 me-2 items-center justify-center rounded-lg outline-none transition-colors duration-200 hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25'">
                                                    @svg($sidebarItem->getIcon(), 'w-5 h-5')
                                                </i>
                                            @endif

                                            {{ $sidebarItem->getTranslatedName() }}
                                        </span>
                                        <svg
                                            :class="expanded && 'rotate-90'"
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="size-4 text-slate-400 transition-transform ease-in-out @if(LaravelLocalization::getCurrentLocale() == 'ar') rotate-180 @endif"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M9 5l7 7-7 7"
                                            />
                                        </svg>
                                    </a>

                                    <ul x-collapse x-show="expanded">
                                        @foreach ($sidebarItem->getItems() as $groupItem)
                                            @canany([$groupItem->getPermissions()])
                                                <li class="ml-4">
                                                    <a
                                                        x-data="navLink"
                                                        {{ generate_href_html($groupItem->getUrl()) }}
                                                        @class([
                                                            "flex items-center justify-start py-2 text-xs+ tracking-wide outline-none transition-colors duration-300 ease-in-out",
                                                            'text-slate-200 hover:text-primary dark:text-navy-200 dark:hover:text-navy-50' => !request()->routeIs($groupItem->getRouteName()),
                                                            'font-medium text-primary dark:text-accent-light' => request()->routeIs($groupItem->getRouteName()),
                                                        ])>
                                                        <div class="flex items-center space-x-2">
                                                            @if (!empty($groupItem->getIcon()))
                                                                <i class="stroke-[0] w-5 h-5 me-2 opacity-75">
                                                                    @svg($groupItem->getIcon(), 'w-5 h-5')
                                                                </i>
                                                            @endif
                                                            <span>
                                                                {{ $groupItem->getTranslatedName() }}
                                                            </span>
                                                        </div>
                                                    </a>
                                                </li>
                                            @endcan
                                        @endforeach
                                    </ul>
                                </li>
                            @else
                                <li>
                                    <a {{ generate_href_html($sidebarItem->getUrl()) }}
                                       x-data="navLink"
                                        @class([
                                             "flex items-center justify-start py-2 text-[0.8rem] tracking-wide outline-none transition-colors duration-200 ease-in-out rounded-lg hover:text-primary dark:hover:text-navy-300",
                                             'font-medium text-primary dark:text-accent-light' => request()->routeIs($sidebarItem->getRouteName()),
                                         ])>
                                        @if (!empty($sidebarItem->getIcon()))
                                            <i
                                                @class([
                                                    'flex size-8 me-2 items-center justify-center rounded-lg outline-none transition-colors duration-200 hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25' => !request()->routeIs($sidebarItem->getRouteName()),
                                                    'flex size-8 me-2 items-center justify-center rounded-lg bg-primary/10 text-primary outline-none transition-colors duration-200 hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:bg-navy-600 dark:text-accent-light dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90' => request()->routeIs($sidebarItem->getRouteName()),
                                                ])>
                                                @svg($sidebarItem->getIcon(), 'w-5 h-5')
                                            </i>
                                        @endif

                                        {{ $sidebarItem->getTranslatedName() }}
                                    </a>
                                </li>
                            @endif
                        @endcan
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
