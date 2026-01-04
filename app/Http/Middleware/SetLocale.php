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
        
        // 2. Check session (session middleware has already run by this point)
        if (!$locale) {
            $locale = session('locale');
        }
        
        // 3. Check cookie
        if (!$locale) {
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
        
        // Store in session for persistence across requests
        session(['locale' => $locale]);
        
        // Queue cookie for response (1 year)
        \Illuminate\Support\Facades\Cookie::queue('locale', $locale, 60 * 24 * 365);
        
        // Share locale with all views
        view()->share('locale', $locale);
        
        return $next($request);
    }
}

