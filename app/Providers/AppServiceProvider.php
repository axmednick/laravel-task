<?php

namespace App\Providers;

use App\Admins;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::share('loginUser', ['url'=>'/login','anchorText'=>'User Login']);
        View::share('RegisterUser', ['url'=>'/register','anchorText'=>'User Register']);
        View::share('LoginAdmin', ['url'=>'/Admin/Login','anchorText'=>'Admin Login']);
        View::share('RegisterAdmin', ['url'=>'/Admin/Register','anchorText'=>'Admin Register']);
    }
}
