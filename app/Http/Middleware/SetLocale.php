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
            $locale = session('locale') ?? $request->cookie('locale') ?? config('app.locale');
        }
        
        // Validate locale
        if (!in_array($locale, ['ar', 'en'])) {
            $locale = config('app.locale');
        }
        
        // Set application locale FIRST
        app()->setLocale($locale);
        
        // Always store in session - session must be started before storing
        session()->put('locale', $locale);
        
        // Queue cookie for response
        \Illuminate\Support\Facades\Cookie::queue('locale', $locale, 60 * 24 * 365);
        
        // Pass locale to view through middleware
        view()->share('locale', $locale);
        
        return $next($request);
    }
}
