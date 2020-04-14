<?php

namespace WizeWiz\EnhancedNotifications\Notifications\Channels;

use Illuminate\Notifications\Channels\DatabaseChannel as LaravelDatabaseChannel;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Log;
use WizeWiz\EnhancedNotifications\EnhancedNotificationsServiceProvider;
use WizeWiz\EnhancedNotifications\Notifications\Contracts\HasNotifier;

class DatabaseChannel extends LaravelDatabaseChannel {

    /**
     * Build an array payload for the DatabaseNotification Model.
     *
     * @param mixed $notifiable
     * @param \Illuminate\Notifications\Notification $notification
     * @return array
     */
    protected function buildPayload($notifiable, Notification $notification) {
        Log::info('WizeWiz:DatabaseChannel@buildPayLoad');
        if($notification instanceof HasNotifier) {
            if($notification->hasNotifier()) {
                $notifier = $notification->getNotifier();
                return [
                    'id' => $notification->id,
                    'type' => EnhancedNotificationsServiceProvider::getTypeAlias(get_class($notification)),
                    'data' => $this->getData($notifiable, $notification),
                    'read_at' => null,
                    'notifier_type' => EnhancedNotificationsServiceProvider::morphToAlias($notifier),
                    'notifier_id' => $notifier->id,
                ];
            }
        }
        // call Laravels native DatabaseChannel
        return parent::buildPayload($notifiable, $notification);
    }

}