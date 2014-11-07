<?php

/**
 * Routes
 */
Route::group(array('prefix' => Config::get('simple-admin::admin.admin_url'), 'before' => 'validate_admin'), function()
{
	
});
// login route
Route::group(array('prefix' => Config::get('simple-admin::admin.admin_url')), function()
{
	// dd(Config::get('simple-admin::admin.login_url'));
	Route::get(Config::get('simple-admin::admin.login_url'),array(
		'as'=>'admin_login_url',
		'uses'=>'Zhzhwcn\SimpleAdmin\AdminController@getLogin',	
	));

	Route::post(Config::get('simple-admin::admin.login_url'),array(
		'as'=>'admin_do_login_url',
		'uses'=>'Zhzhwcn\SimpleAdmin\AdminController@postLogin',	
	));

	Route::get(Config::get('simple-admin::admin.logout_url'),array(
		'as'=>'admin_logout_url',
		'uses'=>'Zhzhwcn\SimpleAdmin\AdminController@getLogout',	
	));
});