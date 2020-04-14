<?php

namespace WizeWiz\EnhancedNotifications;

use Illuminate\Contracts\Notifications\Dispatcher as DispatcherContract;
use Illuminate\Contracts\Notifications\Factory as FactoryContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Notifications\NotificationServiceProvider;
use WizeWiz\EnhancedNotifications\Notifications\Contracts\Notifies;

class EnhancedNotificationsServiceProvider extends NotificationServiceProvider {

    /**
     * Register services.
     *
     * @return void
     */
    public function register() {
        $this->app->singleton(Notifications\ChannelManager::class, function ($app) {
            return new Notifications\ChannelManager($app);
        });

        $this->app->alias(
            Notifications\ChannelManager::class, DispatcherContract::class
        );

        $this->app->alias(
            Notifications\ChannelManager::class, FactoryContract::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot() {
        $this->loadMigrationsFrom(__DIR__.'/migrations/');
        // call Laravels NotificationServiceProvider::boot method.
        parent::boot();
    }

    /**
     * Map morph to key.
     * @return mixed Model or class name (full qualified namespace).
     */
    public static function morphToAlias($class) {
        if($class instanceof Model) {
            $class = get_class($class);
        }
        return array_search($class, Relation::$morphMap) ?: $class;
    }

    /**
     * Get type alias from class.
     * @todo: integrate
     */
    public static function getTypeClass($type) {
        $map = config('enhanced-notifications.map');
        return isset($map[$type]) ? $map[$type] : $type;
    }

    /**
     * Get type class from alias.
     */
    public static function getTypeAlias($alias) {
        return array_search($alias, config('enhanced-notifications.map')) ?: $alias;
    }
}
