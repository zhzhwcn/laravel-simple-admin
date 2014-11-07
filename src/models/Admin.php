<?php
namespace Zhzhwcn\SimpleAdmin;

use Illuminate\Support\Facades\Auth;

class AdminGuard extends Guard
{
    public function getName()
    {
        return 'admin_login_'.md5(get_class($this));
    }

    public function getRecallerName()
    {
        return 'admin_remember_'.md5(get_class($this));
    }
}

Auth::extend('eloquent.admin', function()
{
    dd('test');
    return new AdminGuard(new EloquentUserProvider(new BcryptHasher, 'Admin'), App::make('session.store'));
});