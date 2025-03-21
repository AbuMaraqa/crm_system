@php
    use Filament\Support\Enums\Alignment;

    $notifications = $this->getUnreadNotifications();
    $unreadNotificationsCount = $this->getUnreadNotificationsCount();

    $hasNotifications = $notifications->count();
    $isPaginated = $notifications instanceof \Illuminate\Contracts\Pagination\Paginator && $notifications->hasPages();

@endphp

<div @if ($pollingInterval = $this->getPollingInterval()) wire:poll.{{ $pollingInterval }} @endif class="flex">



    <x-filament::modal :alignment="$hasNotifications ? null : Alignment::Center" close-button :description="$hasNotifications ? null : __('filament-notifications::database.modal.empty.description')" :heading="$hasNotifications ? null : __('filament-notifications::database.modal.empty.heading')" :icon="$hasNotifications ? null : 'heroicon-o-bell-slash'"
        :icon-alias="$hasNotifications ? null : 'notifications::database.modal.empty-state'" :icon-color="$hasNotifications ? null : 'gray'" id="database-notifications" slide-over :sticky-header="$hasNotifications" width="md">
        @if ($hasNotifications)
            <x-slot name="header">
                <div>
                    <x-filament-notifications::database.modal.heading :unread-notifications-count="$unreadNotificationsCount" />


                    @if ($unreadNotificationsCount)
                        <div class="">
                            <x-filament::link color="primary" tag="button" wire:click="markAllNotificationsAsRead">
                                {{ __('filament-notifications::database.modal.actions.mark_all_as_read.label') }}
                            </x-filament::link>
                        </div>
                    @endif
                </div>
            </x-slot>

            <div @class(['-mx-6 -mt-6 divide-y divide-gray-200 dark:divide-white/10'])>
                @foreach ($notifications as $notification)
                    <div @class([
                        'relative before:absolute before:start-0 before:h-full before:w-0.5 before:bg-primary-600 dark:before:bg-primary-500' => $notification->unread(),
                    ])>
                        {{ $this->getNotification($notification)->inline() }}
                    </div>
                @endforeach
            </div>


            @if ($isPaginated)
                <x-slot name="footer">
                    <x-filament::pagination :paginator="$notifications" />
                </x-slot>
            @endif
        @endif

    </x-filament::modal>

</div>
