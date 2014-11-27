<?php

//Filters
App::before(function($request){
    if($request->is(Config::get('simple-admin::admin.admin_url').'*')){
        Config::set('auth.driver', 'eloquent.admin');
        Config::set('auth.model', 'Admin');
        // Config::set('auth.table', 'admin_users');
    }

});
//validate_admin filter
Route::filter('validate_admin', function () {

});
