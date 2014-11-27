<?php
namespace Zhzhwcn\SimpleAdmin;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Config;

class AdminController extends BaseController
{

    protected $layout = "simple-admin::layouts.main";

    public function getLogin()
    {
        $this->layout = View::make('simple-admin::layouts.login');
    }

    public function postLogin()
    {
    	// $admin_auth = app()['adminAuth'];
    	if (Auth::attempt(
    			array(
    				'username'=>Input::get('username'),
    				'password'=>Input::get('password'),
    			)
    		)) {
    		return 'success';
    	} else {
    		return 'error';
    	}
    }

    public function getLogout()
    {}
}
