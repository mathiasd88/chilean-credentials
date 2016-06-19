<?php namespace Mathiasd88\ChileanCredentials;

use Illuminate\Support\ServiceProvider;

class ChileanCredentialsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        app()->bind('rut', function() {
            return new Rut;
        });

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        
    }
}
