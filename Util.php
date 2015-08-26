<?php

namespace Jarboe\Component\Users;

use App;
use Route;
use Cache;
use File;
use Sentinel;


class Util extends \Yaro\Jarboe\Component\AbstractUtil
{
    
    public static function install($command)
    {
        self::copyIfNotExist($command, 'resources/definitions/users.php', __DIR__);
        self::copyIfNotExist($command, 'resources/definitions/groups.php', __DIR__);
        
        self::copyIfNotExist($command, 'resources/definitions/patterns/group_permissions.php', __DIR__);
        self::copyIfNotExist($command, 'resources/definitions/patterns/user_permissions.php', __DIR__);
        self::copyIfNotExist($command, 'resources/definitions/patterns/user_activation.php', __DIR__);
        self::copyIfNotExist($command, 'resources/definitions/patterns/user_password.php', __DIR__);
    } // end install
    
    public static function getNavigationMenuItem() 
    {
        return array(
            'title' => 'Упр. пользователями', 
            'icon'  => 'users',
            'submenu' => array(
                array(
                    'title' => 'Пользователи',
                    'link'  => '/users/users',
                    'check' => function() {
                        return Sentinel::getUser()->hasAccess('users.view');
                    }
                ),
                array(
                    'title' => 'Группы',
                    'link'  => '/users/groups',
                    'check' => function() {
                        return Sentinel::getUser()->hasAccess('users_groups.view');
                    }
                ),
            ),
        );
    } // end getNavigationMenuItem
    
    public static function check()
    {
        $errors = [];
        if (config('cartalyst.sentinel.users.model') !== 'Jarboe\Component\Users\Model\User') {
            $errors[] = ' - config [cartalyst.sentinel.users.model] should be [Jarboe\Component\Users\Model\User]';
        }
        
        return $errors;
    } // end check

}

