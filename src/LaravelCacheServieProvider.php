<?php

namespace CollingMedia\Laravel\Http\Middleware;

use Illuminate\Support\ServiceProvider;

class LaravelCacheServiceProvider extends ServiceProvider
{

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/laravel-cache.php' => config_path('laravel-cache.php'),
        ]);
    }

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/config/laravel-cache.php', 'length'
        );
    }

}
