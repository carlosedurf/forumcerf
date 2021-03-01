<?php

namespace App\Providers;

use App\Models\Channel;
use Illuminate\Pagination\Paginator;
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
        Paginator::useBootstrap();

        view()->composer('layouts.app', function ($view){
            $channels = \App\Models\Channel::all(['slug', 'name']);

            $view->with('channels', $channels);
        });

    }
}
