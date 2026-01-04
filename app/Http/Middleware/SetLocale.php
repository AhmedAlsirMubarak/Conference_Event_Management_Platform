<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Determine locale with priority: URL query > session > cookie > config
        $locale = null;
        
        // 1. Check URL query parameter (highest priority)
        if ($request->has('locale')) {
            $locale = $request->query('locale');
        }
        
        // 2. Check session
        if (!$locale && $request->session()->has('locale')) {
            $locale = $request->session()->get('locale');
        }
        
        // 3. Check cookie
        if (!$locale && $request->hasCookie('locale')) {
            $locale = $request->cookie('locale');
        }
        
        // 4. Use config default
        if (!$locale) {
            $locale = config('app.locale', 'en');
        }
        
        // Validate locale is supported
        if (!in_array($locale, ['ar', 'en'], true)) {
            $locale = config('app.locale', 'en');
        }
        
        // Set the application locale
        app()->setLocale($locale);
        
        // Store in session for persistence
        try {
            $request->session()->put('locale', $locale);
        } catch (\Exception $e) {
            // Fallback if session fails
        }
        
        // Queue cookie for response
        \Illuminate\Support\Facades\Cookie::queue('locale', $locale, 60 * 24 * 365);
        
        // Share with all views
        view()->share('locale', $locale);
        
        return $next($request);
    }
}

