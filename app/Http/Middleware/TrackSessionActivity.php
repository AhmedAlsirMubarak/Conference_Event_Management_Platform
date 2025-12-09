<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\AppSession;
use Jenssegers\Agent\Agent;

class TrackSessionActivity
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Only track if user is authenticated
        if (Auth::check()) {
            $sessionId = session()->getId();
            $user = Auth::user();

            // Get or create session record
            $appSession = AppSession::where('user_id', $user->id)
                ->where('session_token', $sessionId)
                ->first();

            if ($appSession) {
                // Update last activity
                $appSession->updateLastActivity();

                // Check for suspicious activity
                if ($this->isSuspiciousActivity($request, $appSession)) {
                    $appSession->markAsSuspicious();
                }
            }
        }

        return $response;
    }

    /**
     * Check if activity is suspicious
     */
    private function isSuspiciousActivity(Request $request, AppSession $appSession): bool
    {
        $currentIp = $request->ip();
        $storedIp = $appSession->ip_address;

        // Check if IP changed significantly
        if ($storedIp && $currentIp !== $storedIp) {
            return true;
        }

        return false;
    }
}
