# Users component for Jarboe

### Prepare
1. Change config ```cartalyst.sentinel.users.model``` to ```Jarboe\Component\Users\Model\User```
2. Run ```$ php artisan jarboe:component check``` to make sure if all is ok
3. Run ```$ php artisan jarboe:component install``` to install components

### Add links to admin panel menu
config ```jarboe.admin.menu```
```php
<?php
return array(
//...
    'menu' => array(
        //...
        \Jarboe\Component\Users\Util::getNavigationMenuItem(),
        //...
    ),
//...
);
```