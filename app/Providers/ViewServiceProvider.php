<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('layouts.app','App\Providers\ViewProviders\BaseComposer');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
