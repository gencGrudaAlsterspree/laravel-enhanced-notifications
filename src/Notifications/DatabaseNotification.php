<?php

namespace WizeWiz\EnhancedNotifications\Notifications;

use Illuminate\Notifications\DatabaseNotification as LaravelDatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use WizeWiz\EnhancedNotifications\Notifications\Contracts\Notifies;

/**
 * Custom DatabaseNotification class to extends Laravels default DatabaseNotification.
 * @package WizeWiz\EnhancedNotifications\Notifications
 */
class DatabaseNotification extends LaravelDatabaseNotification {

    /**
     * Get the noficationable entity that the notification belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function notifier() {
        return $this->morphTo();
    }

    /**
     * Create a new database notification collection instance.
     *
     * @param array $models
     * @return \WizeWiz\EnhancedNotifications\Notifications\DatabaseNotificationCollection
     */
    public function newCollection(array $models = []) {
        return new DatabaseNotificationCollection($models);
    }
}
