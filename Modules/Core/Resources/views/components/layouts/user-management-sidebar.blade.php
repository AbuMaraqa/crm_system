@php use function Filament\Support\generate_href_html; @endphp
<div class="sticky top-[104px]" wire:ignore>
    <div class="card">
        <div class="p-4 sm:px-5">
            <ul class="space-y-1.5 font-inter font-medium">
                @can('dashboard.user_management.users.view')
                    <li>
                        <a {{ generate_href_html(route('dashboard.user_management.users.view', [$this->user->id])) }}
                            @class([
                                'group flex space-x-2 rounded-lg px-4 py-2.5 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100' => !request()->routeIs('dashboard.user_management.users.view'),
                                'flex space-x-2 rounded-lg bg-slate-150 px-4 py-2.5 tracking-wide text-slate-800 outline-none transition-all dark:bg-navy-500 dark:text-navy-50' => request()->routeIs('dashboard.user_management.users.view')
                            ])>

                            @svg('iconoir-user-circle', 'h-6 w-6 stroke-[1.3]')

                            <span>
                                {{ __('Profile Information') }}
                            </span>
                        </a>
                    </li>
                @endcan

                @can('dashboard.user_management.users.change_password')
                    <li>
                        <a {{ generate_href_html(route('dashboard.user_management.users.change_password', [$this->user->id])) }}
                            @class([
                                'group flex space-x-2 rounded-lg px-4 py-2.5 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100' => !request()->routeIs('dashboard.user_management.users.change_password'),
                                'flex space-x-2 rounded-lg bg-slate-150 px-4 py-2.5 tracking-wide text-slate-800 outline-none transition-all dark:bg-navy-500 dark:text-navy-50' => request()->routeIs('dashboard.user_management.users.change_password')
                            ])>

                            @svg('clarity-lock-line', 'h-6 w-6 stroke-[1.3]')

                            <span>
                                {{ __('Change Password') }}
                            </span>
                        </a>
                    </li>
                @endcan

                @can('dashboard.user_management.users.sessions')
                    <li>
                        <a {{ generate_href_html(route('dashboard.user_management.users.sessions', [$this->user->id])) }}
                            @class([
                                'group flex space-x-2 rounded-lg px-4 py-2.5 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100' => !request()->routeIs('dashboard.user_management.users.sessions'),
                                'flex space-x-2 rounded-lg bg-slate-150 px-4 py-2.5 tracking-wide text-slate-800 outline-none transition-all dark:bg-navy-500 dark:text-navy-50' => request()->routeIs('dashboard.user_management.users.sessions')
                            ])>

                            @svg('clarity-devices-line', 'h-6 w-6 stroke-[1.3]')

                            <span>
                                {{ __('Device History') }}
                            </span>
                        </a>
                    </li>
                @endcan

                @can('dashboard.user_management.users.history')
                    <li>
                        <a {{ generate_href_html(route('dashboard.user_management.users.history', [$this->user->id])) }}
                            @class([
                                'group flex space-x-2 rounded-lg px-4 py-2.5 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100' => !request()->routeIs('dashboard.user_management.users.history'),
                                'flex space-x-2 rounded-lg bg-slate-150 px-4 py-2.5 tracking-wide text-slate-800 outline-none transition-all dark:bg-navy-500 dark:text-navy-50' => request()->routeIs('dashboard.user_management.users.history')
                            ])>

                            @svg('clarity-history-line', 'h-6 w-6 stroke-[1.3]')

                            <span>
                                {{ __('History') }}
                            </span>
                        </a>
                    </li>
                @endcan

                @can('dashboard.user_management.users.messages')
                    <li>
                        <a {{ generate_href_html(route('dashboard.user_management.users.messages', [$this->user->id])) }}
                            @class([
                                'group flex space-x-2 rounded-lg px-4 py-2.5 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100' => !request()->routeIs('dashboard.user_management.users.messages'),
                                'flex space-x-2 rounded-lg bg-slate-150 px-4 py-2.5 tracking-wide text-slate-800 outline-none transition-all dark:bg-navy-500 dark:text-navy-50' => request()->routeIs('dashboard.user_management.users.messages')
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
