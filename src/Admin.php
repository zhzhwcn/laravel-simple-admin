<?php
namespace Zhzhwcn\SimpleAdmin;

use Illuminate\Auth\Guard;
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
    return new AdminGuard(new \Illuminate\Auth\EloquentUserProvider(new \Illuminate\Hashing\BcryptHasher, 'Admin'), \App::make('session.store'));
});