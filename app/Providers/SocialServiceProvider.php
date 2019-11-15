<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Twitter;

class SocialServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        
        $this->app->singleton(Twitter::class, function(){
            return new Twitter('givenkey');
        });

        // $this->app->singleton(Facebook::class, function(){
        //     return new Facebook('givenkey');
        // });
    }
}
