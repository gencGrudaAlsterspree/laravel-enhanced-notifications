# Enhanced Notifications

### Status

0.1 - first working protoype

<br />

### About this package

**This package is "work in progress". Nothing in this repository is production ready!**

This package modifies the default Laravel notification system with a
few helpful features.

- an extra notificationable type.
- class mapping notification types.

#### Notificationable entities.

To avoid saving model data in the type attribute (via `toArray` or `toDatabase` methods), a simple
notificationable type has been added to link the notification entry
with a morphable relation to the entity that called/created the notification.

#### Class mapping notification `types`

By default, the notification type attribute contain a fully qualified classname
of the notification being created. If notifications get moved and the
namespace changes, these have to be changed in the database as well.

For morphable relations, `Relation::$morphMap` solves this problem
where classname can be assigned to an alias. This package supports
a similar approach where notification types can be mapped to an alias, e.g.
in `config/enhanced-notifications.php

```php
return [

    /**
     * Map notification clas type to alias.
     */
    'map' => [
        'App\Notifications\RegisterNotification' => 'register-notification'
    ]
];
```

### License

The MIT License (MIT). Please see [License File](https://github.com/wize-wiz/laravel-mailjet-mailer/blob/master/LICENSE.md) for more information.

### Todo
- workout readme
- add examples
- update composer.json for all depenencies/requirements.
- create a stable version 1.0.