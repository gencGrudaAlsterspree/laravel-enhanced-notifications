<?php

namespace WizeWiz\EnhancedNotifications\Notifications\Contracts;

interface HasNotifier {
    public function setNotifier(Notifies $notifier);
    public function hasNotifier();
    public function getNotifier();
}