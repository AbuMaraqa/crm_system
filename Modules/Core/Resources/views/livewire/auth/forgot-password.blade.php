<div
    id="root"
    class="min-h-100vh flex grow bg-slate-50 dark:bg-navy-900"
    x-cloak
>
    <div class="fixed top-0 hidden p-6 lg:block lg:px-12">
        <a href="#" class="flex items-center space-x-2">
            @if ($logoUrl)
                <img class="size-12" src="{{ $logoUrl }}" alt="{{ __('Logo') }}" />
            @endif
            <p
                class="text-xl font-semibold uppercase text-slate-700 dark:text-navy-100"
            >
                {{ config('app.name') }}
            </p>
        </a>
    </div>
    <div class="hidden w-full place-items-center lg:grid">
        <div class="w-full max-w-lg p-6">
            <img
                class="w-full"
                x-show="!$store.global.isDarkModeEnabled"
                src="{{ asset('images/illustrations/dashboard-check.svg') }}"
                alt="image"
            />
            <img
                class="w-full"
                x-show="$store.global.isDarkModeEnabled"
                src="{{ asset('images/illustrations/dashboard-check-dark.svg') }}"
                alt="image"
            />
        </div>
    </div>

    <main
        class="flex w-full flex-col items-center bg-white dark:bg-navy-700 lg:max-w-md"
    >
        <div class="flex w-full max-w-sm grow flex-col justify-center p-5">
            <div class="text-center">
                <img class="mx-auto size-16 lg:hidden" src="{{ $logoUrl }}" alt="logo">
                <div class="mt-4">
                    <h2 class="text-2xl font-semibold text-slate-600 dark:text-navy-100">
                        {{ __('Forgot Password') }}
                    </h2>
                    <p class="text-slate-400 dark:text-navy-300">
                        {{ __('Please enter your email address to reset your password.') }}
                    </p>
                </div>
            </div>

            <div class="mt-16">
                <form wire:submit="recover">
                    <div class="space-y-6">

                        {{ $this->form }}
                        <div wire:key="{{ rand() }}">
                            <x-filament::button type="submit" size="md" color="primary"
                                                class="btn mt-10 h-10 w-full bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"
                                                wire:target="recover">
                                @lang('Recover Password')
                            </x-filament::button>
                        </div>

                    </div>

                </form>
            </div>

            <div class="mt-4 flex items-center justify-between space-x-2">
                <a
                    href="{{ route('dashboard.login') }}"
                    class="text-xs text-slate-400 transition-colors line-clamp-1 hover:text-slate-800 focus:text-slate-800 dark:text-navy-300 dark:hover:text-navy-100 dark:focus:text-navy-100"
                >
                    {{ __('Sign In') }}
                </a>
            </div>
        </div>
    </main>
</div>
