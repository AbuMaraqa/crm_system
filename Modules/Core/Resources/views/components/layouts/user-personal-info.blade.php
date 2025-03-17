<div class="card">
    <div class="h-48 rounded-t-lg bg-primary dark:bg-accent">
        <img class="h-full w-full rounded-t-lg object-cover object-center"
             src="{{ asset('images/object/object-7.jpg') }}" alt="image">
    </div>
    <div class="px-4 py-2 sm:px-5">
        <div class="flex justify-between space-x-4">
            <div class="avatar -mt-12 size-24">
                <img
                    class="mask is-squircle"
                    src="{{ $this->user->getAvatarUrl('avatar-md') }}"
                    alt="{{ __('Avatar') }}"
                />
                <div
                    class="absolute right-0 size-4 rounded-full border-2 border-white dark:border-navy-700 dark:bg-accent {{ $this->user->status ? 'bg-success' : 'bg-error' }}"></div>
            </div>
        </div>
        <h3 class="pt-2 text-lg font-medium text-slate-700 dark:text-navy-100 flex items-center justify-start">
            {{ $this->user->name }}
            @if ($this->user->hasVerifiedEmail() || $this->user->isInfromationInCompleted())
                <i data-tw-merge="" class="stroke-[1] w-5 h-5 ml-2 fill-blue-500/30 text-blue-500">
                    @svg('iconoir-badge-check', 'w-5 h-5 fill-blue-500/30 text-blue-500')
                </i>
            @endif
        </h3>

        <div class="my-4 flex items-center space-x-3">
            <div class="h-px flex-1 bg-slate-200 dark:bg-navy-500"></div>
            <div class="h-px flex-1 bg-slate-200 dark:bg-navy-500"></div>
        </div>


        <div class="grid grid-cols-12 gap-4 transition-all duration-[.25s] sm:gap-5 lg:gap-6">
            <div class="col-span-12 pb-3 sm:col-span-6">
                <div class="grow space-y-4">
                    <div class="flex items-center space-x-2">
                        <div
                            class="flex h-8 w-8 items-center rounded-lg bg-primary/10 p-2 text-primary dark:bg-accent-light/10 dark:text-accent-light">
                            <i class="text-xs">
                                @svg('eos-email', 'h-4 w-4 fill-blue-500 text-blue-500')
                            </i>
                        </div>

                        <p>
                            <span class="font-medium">
                                {{ __('Email') }}:
                            </span>
                            {{ $this->user->email }}
                        </p>
                    </div>
                    <div class="flex items-center space-x-2">
                        <div
                            class="flex h-8 w-8 items-center rounded-lg bg-primary/10 p-2 text-primary dark:bg-accent-light/10 dark:text-accent-light">
                            <i class="text-xs">
                                @svg('heroicon-s-calendar-days', 'h-4 w-4 fill-purple-500 text-purple-500')
                            </i>
                        </div>

                        <p>
                            <span class="font-medium">
                                {{ __('Member since') }}:
                            </span>
                            {{ $this->user->created_at->diffForHumans() }}
                        </p>

                    </div>
                    <div class="flex items-center space-x-2">
                        <div
                            class="flex h-8 w-8 items-center rounded-lg bg-primary/10 p-2 text-primary dark:bg-accent-light/10 dark:text-accent-light">
                            <i class="text-xs">
                                @if ($this->user->status)
                                    @svg('iconoir-switch-on', 'h-4 w-4 text-green-500')
                                @else
                                    @svg('iconoir-switch-off', 'h-4 w-4 text-red-500')
                                @endif
                            </i>
                        </div>

                        <span class="font-medium">
                            {{ __('Status') }}:
                        </span>

                        @if ($this->user->status)
                            <div class="badge space-x-2.5 rounded-full bg-success/10 text-success dark:bg-success/15">
                                <div class="size-2 rounded-full bg-current"></div>
                                <span>
                                    {{ __('Active') }}
                                </span>
                            </div>
                        @else
                            <div class="badge space-x-2.5 rounded-full bg-error/10 text-error dark:bg-error/15">
                                <div class="size-2 rounded-full bg-current"></div>
                                <span>{{ __('Disabled') }}</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            @if ($this->user->phone_number)
                <div class="col-span-12 pb-3 sm:col-span-6">
                    <div class="grow space-y-4">
                        <div class="flex items-center space-x-2">
                            <div
                                class="flex h-8 w-8 items-center rounded-lg bg-primary/10 p-2 text-primary dark:bg-accent-light/10 dark:text-accent-light">
                                <i class="text-xs">
                                    @svg('eos-phone-iphone', 'h-4 w-4 fill-indigo-500 text-indigo-500')
                                </i>
                            </div>

                            <span class="font-medium">
                                {{ __('Phone') }}:
                            </span>
                            <a href="tel:{{ $this->user->getNationalPhone() }}" class="ms-1 underline" dir="ltr">
                                {{ $this->user->getNationalFormattedPhone() }}
                            </a>
                        </div>

                        <div class="flex items-center space-x-2">
                            <div
                                class="flex h-8 w-8 items-center rounded-lg bg-primary/10 p-2 text-primary dark:bg-accent-light/10 dark:text-accent-light">
                                <i class="text-xs">
                                    @svg('eos-phone-android', 'h-4 w-4 fill-orange-500 text-orange-500')
                                </i>
                            </div>

                            <span class="font-medium">
                                {{ __('Phone') }}:
                            </span>
                            <a href="tel:{{ $this->user->getInterNationalPhone() }}" class="ms-1 underline" dir="ltr">
                                {{ $this->user->getInterNationalFormattedPhone() }}
                            </a>
                        </div>

                        <div class="flex items-center space-x-2">
                            <div
                                class="flex h-8 w-8 items-center rounded-lg bg-primary/10 p-2 text-primary dark:bg-accent-light/10 dark:text-accent-light">
                                <i class="text-xs">
                                    @svg('eos-whatsapp', 'h-4 w-4 fill-green-500 text-green-500')
                                </i>
                            </div>

                            <span class="font-medium">
                                {{ __('WhatsApp') }}:
                            </span>
                            <a href="https://wa.me/{{ $this->user->getInterNationalPhone() }}" class="ms-1 underline"
                               dir="ltr">
                                {{ $this->user->getInterNationalPhone() }}
                            </a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
