<?php

namespace WizeWiz\EnhancedNotifications\Notifications;

/**
 * Custom Notifiable trait to extend Laravels default Notifiable.
 * @package WizeWiz\EnhancedNotifications\Notifications
 */
trait Notifiable {
    use HasDatabaseNotifications, RoutesNotifications;
}
