<?php

namespace App\Providers;

use App\Society;
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

      view()->composer('*', function($view){
         $society = Society::first();
         $view->with('society', $society);
         });
    }
}
