<?php

namespace WizeWiz\EnhancedNotifications\Notifications;

use Illuminate\Notifications\Notification as LaravelNotification;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use WizeWiz\EnhancedNotifications\Notifications\Contracts\HasNotifier;
use WizeWiz\EnhancedNotifications\Notifications\Contracts\Notifies;

/**
 * Custom Notification class to extends Laravels default Notification.
 * @package WizeWiz\EnhancedNotifications\Notifications
 */
class Notification extends LaravelNotification implements HasNotifier {

    protected $notifier;

    /**
     * Set the notifier entity.
     *
     * @param Notifies $notifier
     * @return $this
     */
    public function setNotifier(Notifies $notifier) {
        $this->notifier = $notifier;
        return $this;
    }

    public function updateNotifier(Notifies $notifier) {
        Log::info('updating notifier');
        Log::info($this->id);
    }

    /**
     * Has a notifier entity.
     *
     * @return bool
     */
    public function hasNotifier() : bool {
        return $this->notifier !== null;
    }

    /**
     * Return the notifier entity.
     *
     * @return Notifies
     */
    public function getNotifier() {
        return $this->notifier;
    }

}

