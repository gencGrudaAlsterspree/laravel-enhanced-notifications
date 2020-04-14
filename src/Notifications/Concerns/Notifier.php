<?php

namespace WizeWiz\EnhancedNotifications\Notifications\Concerns;

trait Notifier {

    /**
     * Get the entity which created the notification.
     *
     * @return
     */
    public function notifiers() {
        return $this->morphMany(DatabaseNotification::class, 'notifier')->orderBy('created_at', 'desc');
    }
}