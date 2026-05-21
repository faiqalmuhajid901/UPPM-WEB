<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Force session driver to use file instead of database
        // This overrides the .env SESSION_DRIVER setting
        config(['session.driver' => 'file']);
    }
}
