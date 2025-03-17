<div>
    @if (!$this->user->hasVerifiedEmail() || !$this->user->isInfromationInCompleted())
        <div class="alert flex rounded-lg bg-success text-white mb-4 mt-4">

            <div class="flex flex-col justify-center px-4 py-3 sm:px-5">
                {{ __('Congratulations!') }}

                <div class="mt-3">
                    {{ __('Congratulations, you have successfully registered, there are a few procedures left to be able to benefit from our services.') }}

                    <ul class="space-y-2 md:space-y-0 mt-2">
                        @if (!$this->user->hasVerifiedEmail())
                            <li>
                                <div class="flex flex-col md:flex-row items-center gap-1">
                                    <span class="font-bold">{{ __('Email Verification') }}</span>

                                    <button data-tw-merge wire:click="sendVerificationRequest"
                                            class="btn space-x-2 rounded-full bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">

                                        <span wire:loading.remove wire:target="sendVerificationRequest">
                                            {{ __('Send verification request') }}
                                        </span>

                                        <span wire:loading.flex wire:target="sendVerificationRequest"
                                              class="hidden gap-2 justify-center items-center">
                                            <span class="font-bold center text-sm">{{ __('Waiting') }}</span>

                                            <svg class="animate-spin h-4 w-4" fill="currentColor"
                                                 xmlns="http://www.w3.org/2000/svg"
                                                 version="1.0"
                                                 viewBox="0 0 128 128" xml:space="preserve">
                                                <path
                                                    d="M64 9.75A54.25 54.25 0 0 0 9.75 64H0a64 64 0 0 1 128 0h-9.75A54.25 54.25 0 0 0 64 9.75z" />
                                            </svg>
                                        </span>
                                    </button>
                                </div>
                            </li>
                        @endif

                        @if (!$this->user->isInfromationInCompleted())
                            <li>
                                <div class="flex flex-col md:flex-row items-center gap-1">
                                    <span class="font-bold">{{ __('Complete your information') }}</span>

                                    <a href="{{ route('dashboard.account.profile.edit') }}" data-tw-merge
                                       class="btn space-x-2 bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                                        <span>
                                            {{ __('Go') }}
                                        </span>
                                    </a>
                                </div>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    @endif

    @if (!$this->user->isAccountActive())
        <div class="alert flex overflow-hidden rounded-lg border border-error text-error mt-4 mb-4">
            <div class="bg-error p-3 text-white">
                @svg('clarity-info-standard-line', 'h-6 w-6')
            </div>
            <div class="flex flex-col justify-center px-4 py-3 sm:px-5">
                <span class="font-medium">
                    {{ __('Account Status!') }}
                </span>
                <div>
                    {{ __('This account has been disabled for some reason.') }}
                </div>
            </div>
        </div>
    @endif

    @foreach ($messages as $message)
        @livewire(\Modules\Core\Livewire\Widgets\UserMessages::class, [$message->id])
    @endforeach

    <div class="mt-3.5 grid grid-cols-12 gap-x-6 gap-y-10">
        <div class="relative col-span-12 md:col-span-4">
            <x-core::layouts.account-sidebar :user="$this->user" />
        </div>

        <div class="col-span-12 flex flex-col gap-y-7 md:col-span-8">
            <x-core::layouts.account-personal-info :user="$this->user" />
        </div>
    </div>
</div>
