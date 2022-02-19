<?php

namespace App\Providers;

use Validator;
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
        Validator::extend('dash2', function ($attribute, $value, $parameters, $validator){
            //dd($attribute, $value, $parameters, $validator);
            return ! strpos($value,'-');
        });
    }
}
