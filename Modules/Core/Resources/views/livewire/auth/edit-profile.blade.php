<div>
    @if (auth()->user() instanceof MustVerifyEmail && !auth()->user()->hasVerifiedEmail())
        <div class="flex gap-2 items-center justify-center py-3 px-2 bg-blue-600 dark:bg-blue-900 rounded drop-shadow">
            <p class="text-white font-normal">
                {{ __('Verifying your email is an important step in ensuring that you have access to your account and that your personal information is protected.') }}
            </p>
            <button wire:click="sendVerificationEmail"
                    class="text-white underline outline-none focus:ring-1 focus:ring-white p-1 rounded">{{ __('Send Verification Email') }}</button>
        </div>
    @endif

    <div class="mt-3.5 grid grid-cols-12 gap-x-6 gap-y-10">
        <div class="relative col-span-12 xl:col-span-3">
            <x-core::layouts.account-sidebar :user="$this->user" />
        </div>

        <div class="col-span-12 flex flex-col gap-y-7 xl:col-span-9">
            <x-core::layouts.account-personal-info :user="$this->user" />

            <div class="card card-shadow flex-row justify-between space-x-2 p-2.5">
                <div class="flex flex-1 flex-col justify-between">
                    <div class="line-clamp-3">
                        <h2 class="text-lg font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">
                            @lang('Profile Information')
                        </h2>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-2">
                            <div>
                                <p class="text-sm font-medium line-clamp-1">
                                    @lang('Profile Photo')
                                </p>
                                <p class="text-sm text-slate-400 line-clamp-1 dark:text-navy-300">
                                    @lang('Generate a random avatar for your profile.')
                                </p>
                            </div>
                        </div>
                        <div class="flex">
                            <div wire:key="{{ rand() }}">
                                <x-filament::button type="button" size="md" color="warning" wire:click="generateAvatar"
                                                    wire:target="generateAvatar" data-tw-merge=""
                                                    class="btn !rounded-full bg-success font-medium text-white hover:bg-success-focus focus:bg-success-focus active:bg-success-focus/90/50 focus:bg-info-focus focus:shadow-lg focus:shadow-info/50 active:bg-info-focus/90">
                                    @lang('Generate Avatar')
                                </x-filament::button>
                            </div>
                        </div>
                    </div>
                </div>
                <img src="{{ $this->user->getAvatarUrl('avatar-md') }}" class="size-28 rounded-lg object-cover object-center" alt="{{ __('Avatar') }}">
            </div>


            <form wire:submit="save">
                <div class="space-y-6">

                    {{ $this->form }}

                    <x-core::form.control-buttons saveButton cancelButton />
                </div>
            </form>
        </div>
    </div>
</div>
