<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//use Nette\Schema\Schema;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;
//use Nette\Utils\Paginator;

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
        Paginator::useBootstrap();
        Schema::defaultStringLength(191);
    }
}
