<?php namespace Zhzhwcn\SimpleAdmin;

use Illuminate\Auth\Guard as OriginalGuard;

class Guard extends OriginalGuard {
	
	public function getName() {
		return Config::get('simple-admin::auth.admin_cookie') . '_' . md5(get_class($this));
	}
	
	public function getRecallerName() {
		return Config::get('simple-admin::auth.admin_cookie') . '_' . md5(get_class($this));
	}
	
}
