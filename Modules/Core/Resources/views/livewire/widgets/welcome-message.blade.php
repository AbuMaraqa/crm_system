@php use Modules\Core\Entities\User;use function Filament\Support\generate_href_html; @endphp
@php
    /**
     * @var User $authUser
     */
@endphp

<div class="mt-4 grid grid-cols-12 gap-4 sm:mt-5 sm:gap-5 lg:mt-6 lg:gap-6">
    <div class="col-span-12 lg:col-span-5">
        <div
            :class="$store.breakpoints.smAndUp && 'via-purple-300'"
            class="card mt-12 bg-gradient-to-l from-pink-300 to-indigo-400 p-5 sm:mt-0 sm:flex-row h-full"
        >
            <div class="flex justify-center sm:order-last">
                <img
                    class="-mt-16 h-40 sm:mt-0"
                    src="{{ asset('images/illustrations/awards-man.svg') }}"
                    alt=""
                />
            </div>
            <div
                class="mt-2 flex-1 pt-2 text-center text-white sm:mt-0 sm:text-left"
            >
                <h3 class="text-2xl">
                    @lang('Welcome back,')
                    <span class="font-semibold">
                        {{ $authUser->name }}
                    </span>
                </h3>
                <p class="mt-2 leading-relaxed text-sm">
                    @lang('You are using :role role.', ['role' => $authUser->currentRole->name])
                </p>
                <p class="text-sm">
                    @lang('You have :count unread notifications.', ['count' => $authUser->unreadNotifications()->count()])
                </p>
            </div>
        </div>
    </div>
    <div class="col-span-12 lg:col-span-3">
        <div class="card flex grow flex-col items-center p-5 h-full">
            <div class="avatar size-20">
                <img
                    class="mask is-star"
                    src="{{ $authUser->getAvatarUrl() }}"
                    alt="avatar"
                />
            </div>
            <h3
                class="pt-3 text-lg font-medium text-slate-700 dark:text-navy-100"
            >
                {{ $authUser->name }}
            </h3>
            <p class="text-xs+">
                {{ $authUser->email }}
            </p>
            <div class="mt-6 grid w-full grid-cols-2 gap-2">
                <a {{ generate_href_html(route('dashboard.account.profile')) }}
                   class="btn space-x-2 bg-primary px-0 font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="size-4 shrink-0"
                        fill="none"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke="currentColor"
                            stroke-width="2"
                            d="M5 19.111c0-2.413 1.697-4.468 4.004-4.848l.208-.035a17.134 17.134 0 015.576 0l.208.035c2.307.38 4.004 2.435 4.004 4.848C19 20.154 18.181 21 17.172 21H6.828C5.818 21 5 20.154 5 19.111zM16.083 6.938c0 2.174-1.828 3.937-4.083 3.937S7.917 9.112 7.917 6.937C7.917 4.764 9.745 3 12 3s4.083 1.763 4.083 3.938z"
                        />
                    </svg>
                    <span>
                        @lang('Profile')
                    </span>
                </a>
                <button wire:click="logout"
                    class="btn space-x-2 bg-slate-150 px-0 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90"
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
    <div class="col-span-12 lg:col-span-4">
        <div class="card flex flex-row items-center justify-between p-5 h-full">
            <div class="flex flex-col items-center">
                <div class="text-lg font-medium text-primary/90">
                    {{ $todayDay }}
                </div>
                <div class="mt-1 text-slate-500">
                    {{ $todayDate }}
                </div>
            </div>
            <div class="flex flex-col items-center">
                <analog-clock class="js-stopwatch"></analog-clock>
            </div>
        </div>
    </div>
</div>
