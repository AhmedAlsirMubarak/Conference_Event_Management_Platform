<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Events\ContactSubmitted;
use App\Listeners\SendContactNotifications;

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
        // Register event listeners
        $this->app['events']->listen(
            ContactSubmitted::class,
            SendContactNotifications::class
        );
    }
}
