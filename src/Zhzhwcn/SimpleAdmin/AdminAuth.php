<?php namespace Zhzhwcn\SimpleAdmin;

use Illuminate\Auth\AuthManager as OriginalAuthManager;
use Illuminate\Auth\DatabaseUserProvider;
use Illuminate\Support\Facades\Config;

class AdminAuth extends OriginalAuthManager {
	
	public function __construct($app)
	{
		parent::__construct($app);
	}
	
	protected function createDatabaseProvider() {
		$connection = $this->app['db']->connection();
		$table = Config::get('simple-admin::auth.auth_table');

		return new DatabaseUserProvider($connection, $this->app['hash'], $table);
	}

}
