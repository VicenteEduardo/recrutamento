<?php

namespace App\Providers;

use App\Classes\UserPermission;
use App\Models\Configuration;
use App\Models\Service;
use App\Models\User;
use App\Models\UserPermisson;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    private $Permission;
    public function __construct()
    {

        $this->Permission = new UserPermission;
    }
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
        Paginator::useBootstrap();


    }
}
