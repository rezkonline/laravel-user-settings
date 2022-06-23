<?php

namespace Rezkonline\LaravelUserSettings;

use Illuminate\Support\ServiceProvider as Provider;

class ServiceProvider extends Provider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/config.php' => config_path('laravel-user-settings.php'),
        ], 'config');

        $this->publishes([
            __DIR__.'/../migrations/' => base_path('/database/migrations')
        ], 'migrations');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('setting', 'Rezkonline\LaravelUserSettings\Setting');

        $this->mergeConfigFrom(
            __DIR__.'/../config/config.php', 'laravel-user-settings'
        );
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
