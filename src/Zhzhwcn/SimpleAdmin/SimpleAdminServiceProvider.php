<?php namespace Zhzhwcn\SimpleAdmin;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;

class SimpleAdminServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('zhzhwcn/simple-admin');
		//include our filters, view composers, and routes
		include __DIR__.'/../../Admin.php';
		include __DIR__.'/../../filters.php';
		include __DIR__.'/../../viewComposers.php';
		include __DIR__.'/../../routes.php';
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
