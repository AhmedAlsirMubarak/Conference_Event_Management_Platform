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

        // Register global helper to append locale to URLs
        view()->composer('*', function ($view) {
            $locale = session('locale', config('app.locale'));
            $view->with('currentLocale', $locale);
            // Create a helper to generate locale-aware URLs
            $view->with('withLocale', function($url) use ($locale) {
                $separator = strpos($url, '?') === false ? '?' : '&';
                return $url . $separator . 'locale=' . $locale;
            });
        });
    }
}
