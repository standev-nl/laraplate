<?php

namespace StanDev\Laraplate;

use Illuminate\Support\ServiceProvider;

class LaraplateServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package laraplate
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'laraplate');
         $this->loadViewsFrom(__DIR__.'/../resources/views', 'laraplate');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
         $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('laraplate.php'),
            ], 'laraplate-config');

            // Publishing the views.
            $this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/laraplate'),
            ], 'laraplate-views');

            // Publishing laraplate.
            $this->publishes([
                __DIR__ . '/../resources/laraplate' => resource_path('laraplate'),
            ], 'laraplate-assets');

            // Publishing migrations
            $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');


            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/laraplate'),
            ], 'lang');*/

            // Registering package commands.
            // $this->commands([]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'laraplate');

        // Register the main class to use with the facade
        $this->app->singleton('laraplate', function () {
            return new Laraplate;
        });
    }
}
