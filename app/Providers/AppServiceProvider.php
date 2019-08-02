<?php

namespace App\Providers;

use App\Channel;
use App\User;
use App\Observers\UserObserver;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(UserObserver::class);
        // Sharing the channels varable to all the view
        // \View::share('channels',Channel::all());
        \View::composer('*',function($view){
            $channels = \Cache::rememberForever('channels',function(){
                return Channel::all();
            });
            $view->with('channels',$channels);
        });

        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if($this->app->isLocal()){
            $this->app->register(\Barryvdh\Debugbar\ServiceProvider::class);
        }
    }
}
