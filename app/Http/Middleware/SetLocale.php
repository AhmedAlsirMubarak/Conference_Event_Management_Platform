<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Priority: URL query parameter > session > cookie > config
        $locale = $request->query('locale');
        
        if (!$locale) {
            // Try to get from session first (this persists across requests)
            if ($request->session()->has('locale')) {
                $locale = $request->session()->get('locale');
            } else {
                // Fall back to cookie or config
                $locale = $request->cookie('locale') ?? config('app.locale');
            }
        }
        
        // Validate locale is one of our supported locales
        if (!in_array($locale, ['ar', 'en'])) {
            $locale = config('app.locale');
        }
        
        // Set application locale - this affects the __() function and translations
        app()->setLocale($locale);
        
        // Store in session for persistence across requests
        $request->session()->put('locale', $locale);
        
        // Queue cookie for response (1 year duration)
        \Illuminate\Support\Facades\Cookie::queue('locale', $locale, 60 * 24 * 365);
        
        // Share with views
        view()->share('locale', $locale);
        
        return $next($request);
    }
}
