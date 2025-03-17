@php use function Filament\Support\generate_href_html; @endphp
<div class="sticky top-[104px]" wire:ignore>
    <div class="card">
        <div class="p-4 sm:px-5">
            <ul class="space-y-1.5 font-inter font-medium">
                @can('dashboard.account.profile')
                    <li>
                        <a {{ generate_href_html(route('dashboard.account.profile')) }}
                            @class([
                                'group flex space-x-2 rounded-lg px-4 py-2.5 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100' => !request()->routeIs('dashboard.account.profile'),
                                'flex space-x-2 rounded-lg bg-slate-150 px-4 py-2.5 tracking-wide text-slate-800 outline-none transition-all dark:bg-navy-500 dark:text-navy-50' => request()->routeIs('dashboard.account.profile')
                            ])>

                            @svg('iconoir-user-circle', 'h-6 w-6 stroke-[1.3]')

                            <span>
                                {{ __('Profile Information') }}
                            </span>
                        </a>
                    </li>
                @endcan

                @can('dashboard.account.profile.edit')
                    <li>
                        <a {{ generate_href_html(route('dashboard.account.profile.edit')) }}
                            @class([
                                'group flex space-x-2 rounded-lg px-4 py-2.5 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100' => !request()->routeIs('dashboard.account.profile.edit'),
                                'flex space-x-2 rounded-lg bg-slate-150 px-4 py-2.5 tracking-wide text-slate-800 outline-none transition-all dark:bg-navy-500 dark:text-navy-50' => request()->routeIs('dashboard.account.profile.edit')
                            ])>

                            @svg('clarity-pencil-line', 'h-6 w-6 stroke-[1.3]')

                            <span>
                                {{ __('Manage Profile') }}
                            </span>
                        </a>
                    </li>
                @endcan

                @can('dashboard.account.change_password')
                    <li>
                        <a {{ generate_href_html(route('dashboard.account.change_password')) }}
                            @class([
                                'group flex space-x-2 rounded-lg px-4 py-2.5 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100' => !request()->routeIs('dashboard.account.change_password'),
                                'flex space-x-2 rounded-lg bg-slate-150 px-4 py-2.5 tracking-wide text-slate-800 outline-none transition-all dark:bg-navy-500 dark:text-navy-50' => request()->routeIs('dashboard.account.change_password')
                            ])>

                            @svg('clarity-lock-line', 'h-6 w-6 stroke-[1.3]')

                            <span>
                                {{ __('Change Password') }}
                            </span>
                        </a>
                    </li>
                @endcan

                @can('dashboard.account.sessions')
                    <li>
                        <a {{ generate_href_html(route('dashboard.account.sessions')) }}
                            @class([
                                'group flex space-x-2 rounded-lg px-4 py-2.5 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100' => !request()->routeIs('dashboard.account.sessions'),
                                'flex space-x-2 rounded-lg bg-slate-150 px-4 py-2.5 tracking-wide text-slate-800 outline-none transition-all dark:bg-navy-500 dark:text-navy-50' => request()->routeIs('dashboard.account.sessions')
                            ])>

                            @svg('clarity-devices-line', 'h-6 w-6 stroke-[1.3]')

                            <span>
                                {{ __('Device History') }}
                            </span>
                        </a>
                    </li>
                @endcan

                @can('dashboard.account.history')
                    <li>
                        <a {{ generate_href_html(route('dashboard.account.history')) }}
                            @class([
                                'group flex space-x-2 rounded-lg px-4 py-2.5 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100' => !request()->routeIs('dashboard.account.history'),
                                'flex space-x-2 rounded-lg bg-slate-150 px-4 py-2.5 tracking-wide text-slate-800 outline-none transition-all dark:bg-navy-500 dark:text-navy-50' => request()->routeIs('dashboard.account.history')
                            ])>

                            @svg('clarity-history-line', 'h-6 w-6 stroke-[1.3]')

                            <span>
                                {{ __('History') }}
                            </span>
                        </a>
                    </li>
                @endcan

                @can('dashboard.account.notifications')
                    <li>
                        <a {{ generate_href_html(route('dashboard.account.notifications')) }}
                            @class([
                                'group flex space-x-2 rounded-lg px-4 py-2.5 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100' => !request()->routeIs('dashboard.account.notifications'),
                                'flex space-x-2 rounded-lg bg-slate-150 px-4 py-2.5 tracking-wide text-slate-800 outline-none transition-all dark:bg-navy-500 dark:text-navy-50' => request()->routeIs('dashboard.account.notifications')
                            ])>

                            @svg('clarity-bell-line', 'h-6 w-6 stroke-[1.3]')

                            <span>
                                {{ __('Notifications') }}
                            </span>
                        </a>
                    </li>
                @endcan
            </ul>
        </div>
    </div>
</div>
