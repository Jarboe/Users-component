<?php

Route::group(array('prefix' => config('jarboe.admin.uri'), 'before' => array('auth_admin', 'check_permissions')), function() {

    Route::any('users/users', 'Jarboe\Component\Users\Http\Controllers\AdminController@users');
    Route::any('users/groups', 'Jarboe\Component\Users\Http\Controllers\AdminController@groups');
    
});

