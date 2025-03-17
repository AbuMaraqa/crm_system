<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Traits;

use Carbon\CarbonInterface;
use Filament\Notifications\Notification;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Livewire\Attributes\On;
use Modules\Core\Services\Settings\ApplicationSettings;

trait InteractsWithNotifications
{
    public static ?string $trigger = null;

    public static ?string $authGuard = null;

    private ApplicationSettings $applicationSettings;

    public function bootInteractsWithNotifications(
        ApplicationSettings $applicationSettings,
    ) {
        $this->applicationSettings = $applicationSettings;
    }

    private function dispatchRefreshEvent()
    {
        $this->dispatch('databaseNotificationsRefreshed');
    }

    #[On('databaseNotificationsSent')]
    public function refresh(): void
    {
        $this->dispatchRefreshEvent();
    }

    #[On('notificationClosed')]
    public function removeNotification(string $id): void
    {
        $this->markNotificationAsRead($id);
        $this->dispatchRefreshEvent();
    }

    #[On('markedNotificationAsRead')]
    public function markNotificationAsRead(string $id): void
    {
        $this->getNotificationsQuery()
            ->where('id', $id)
            ->update(['read_at' => now()]);
        $this->dispatchRefreshEvent();
    }

    #[On('markedNotificationAsUnread')]
    public function markNotificationAsUnread(string $id): void
    {
        $this->getNotificationsQuery()
            ->where('id', $id)
            ->update(['read_at' => null]);
        $this->dispatchRefreshEvent();
    }

    public function clearNotifications(): void
    {
        $this->getNotificationsQuery()->delete();
        $this->dispatchRefreshEvent();
    }

    public function markAllNotificationsAsRead(): void
    {
        $this->getUnreadNotificationsQuery()->update(['read_at' => now()]);
        $this->dispatchRefreshEvent();
    }

    public function getNotificationCount(): int
    {
        return $this->applicationSettings->getValue('notifications_displayed_count', 15);
    }

    public function getNotifications(): DatabaseNotificationCollection|Paginator
    {
        $this->dispatchRefreshEvent();

        if (!$this->isPaginated()) {
            /** @phpstan-ignore-next-line */
            return $this->getNotificationsQuery()->take($this->getNotificationCount())->get();
        }

        return $this->getNotificationsQuery()->simplePaginate($this->getNotificationCount(), pageName: 'notifications-page');
    }

    public function getUnreadNotifications(): DatabaseNotificationCollection|Paginator
    {
        $this->dispatchRefreshEvent();

        if (!$this->isPaginated()) {
            /** @phpstan-ignore-next-line */
            return $this->getUnreadNotificationsQuery()->take($this->getNotificationCount())->get();
        }

        return $this->getUnreadNotificationsQuery()->simplePaginate($this->getNotificationCount(), pageName: 'notifications-page');
    }

    public function isPaginated(): bool
    {
        return $this->applicationSettings->getValue('notifications_multiple_pages', true);
    }

    public function getNotificationsQuery(): Builder|Relation
    {
        /** @phpstan-ignore-next-line */
        return $this->getUser()->notifications()->where('data->format', 'filament');
    }

    public function getUnreadNotificationsQuery(): Builder|Relation
    {
        /** @phpstan-ignore-next-line */
        return $this->getNotificationsQuery()->unread()->latest();
    }

    public function getUnreadNotificationsCount(): int
    {
        return $this->getUnreadNotificationsQuery()->count();
    }

    public function getPollingInterval(): ?string
    {
        $autoUpdate = (bool) $this->applicationSettings->getValue('notifications_auto_update', true);

        return $autoUpdate ? $this->applicationSettings->getValue('notifications_polling_interval', 30) . 's' : null;
    }

    public function getTrigger(): ?View
    {
        $viewPath = static::$trigger;

        if (blank($viewPath)) {
            return null;
        }

        return view($viewPath);
    }

    public function getUser(): Model|Authenticatable|null
    {
        return auth(static::$authGuard)->user();
    }

    public function getBroadcastChannel(): ?string
    {
        $user = $this->getUser();

        if (!$user) {
            return null;
        }

        if (method_exists($user, 'receivesBroadcastNotificationsOn')) {
            return $user->receivesBroadcastNotificationsOn();
        }

        $userClass = str_replace('\\', '.', $user::class);

        return "{$userClass}.{$user->getKey()}";
    }

    public function getNotification(DatabaseNotification $notification): Notification
    {
        return Notification::fromDatabase($notification)
            ->date($this->formatNotificationDate($notification->getAttributeValue('created_at')));
    }

    protected function formatNotificationDate(CarbonInterface $date): string
    {
        $applicationSettings = app(ApplicationSettings::class);
        $timmezone = $applicationSettings->getValue('timezone', config('app.timezone'));

        return $date
            ->timezone($timmezone)
            ->diffForHumans();
    }
}
