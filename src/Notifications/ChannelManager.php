<?php

namespace WizeWiz\EnhancedNotifications\Notifications;

use Illuminate\Notifications\ChannelManager as LaravelChannelManager;

class ChannelManager extends LaravelChannelManager {

    /**
     * Create an instance of the database driver.
     *
     * @return \Illuminate\Notifications\Channels\DatabaseChannel
     */
    protected function createDatabaseDriver() {
        return $this->container->make(Channels\DatabaseChannel::class);
    }

}