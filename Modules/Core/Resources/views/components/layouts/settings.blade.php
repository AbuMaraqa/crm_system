@php use function Filament\Support\generate_href_html; @endphp
<div class="grid grid-cols-12 gap-x-6 gap-y-10 mb-8">
    <div class="col-span-12">
        <div class="mt-3.5 grid grid-cols-12 gap-5" wire:ignore>
            @foreach ($sidebar->getItems() as $sidebarItem)
                @canany($sidebarItem->getPermissions())
                    <div class="2xl:col-span-3 xl:col-span-4 lg:col-span-6 md:col-span-6 sm:col-span-6 col-span-12">
                        <div class="card flex-row justify-between space-x-2 p-2.5 h-full card-shadow">
                            <div class="flex flex-1 flex-col justify-between">
                                <div class="line-clamp-3">
                                    <a {{generate_href_html($sidebarItem->getUrl()) }}
                                       class="font-medium text-lg text-slate-700 hover:text-primary focus:text-primary dark:text-navy-100 dark:hover:text-accent-light dark:focus:text-accent-light">
                                        {{ $sidebarItem->getTranslatedName() }}
                                    </a>
                                    <p class="pt-2 text-sm">
                                        @if(!empty($sidebarItem->getDescription()))
                                            {{ __($sidebarItem->getDescription()) }}
                                        @endif
                                    </p>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-2">
                                        <div class="mt-4">
                                            <a {{ generate_href_html($sidebarItem->getUrl()) }}
                                               class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 hover:shadow-lg hover:shadow-slate-200/50 focus:bg-slate-200 focus:shadow-lg focus:shadow-slate-200/50 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:hover:shadow-navy-450/50 dark:focus:bg-navy-450 dark:focus:shadow-navy-450/50 dark:active:bg-navy-450/90">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                </svg>

                                                <span>
                                                    {{ __('View Settings') }}
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if (!empty($sidebarItem->getIcon()))
                                <div class="avatar size-28 bg-slate-100 mask is-star">
                                    <img
                                        class="mask is-squircle p-6"
                                        src="{{ $sidebarItem->getIcon() }}"
                                        alt="setting-icon"
                                    />
                                </div>
                            @endif
                        </div>
                    </div>
                @endcan
            @endforeach
        </div>
    </div>

    <div class="col-span-12">
        {{ $slot }}
    </div>
</div>
