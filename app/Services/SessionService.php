<?php

namespace App\Services;

use App\Models\AppSession;
use Illuminate\Http\Request;

class SessionService
{
    /**
     * Create a new session record
     */
    public static function createSession(Request $request, $user)
    {
        $sessionToken = bin2hex(random_bytes(32));

        return AppSession::create([
            'user_id' => $user->id,
            'session_token' => $sessionToken,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'browser' => self::getBrowser($request->userAgent()),
            'platform' => self::getPlatform($request->userAgent()),
            'login_at' => now(),
            'last_activity_at' => now(),
            'is_active' => true,
            'device_id' => self::generateDeviceId($request),
        ]);
    }

    /**
     * End a session
     */
    public static function endSession($userId, $sessionId = null)
    {
        if ($sessionId) {
            AppSession::where('user_id', $userId)
                ->where('id', $sessionId)
                ->where('is_active', true)
                ->update([
                    'is_active' => false,
                    'logout_at' => now(),
                ]);
        }
    }

    /**
     * Get all active sessions for a user
     */
    public static function getActiveSessions($userId)
    {
        return AppSession::where('user_id', $userId)
            ->where('is_active', true)
            ->orderBy('login_at', 'desc')
            ->get();
    }

    /**
     * Terminate a specific session
     */
    public static function terminateSession($sessionId, $userId)
    {
        return AppSession::where('id', $sessionId)
            ->where('user_id', $userId)
            ->update([
                'is_active' => false,
                'logout_at' => now(),
            ]);
    }

    /**
     * Terminate all other sessions
     */
    public static function terminateOtherSessions($userId, $currentSessionId)
    {
        return AppSession::where('user_id', $userId)
            ->where('id', '!=', $currentSessionId)
            ->where('is_active', true)
            ->update([
                'is_active' => false,
                'logout_at' => now(),
            ]);
    }

    /**
     * Get session activity history
     */
    public static function getSessionHistory($userId, $limit = 50)
    {
        return AppSession::where('user_id', $userId)
            ->orderBy('login_at', 'desc')
            ->limit($limit)
            ->get();
    }

    /**
     * Get suspicious sessions
     */
    public static function getSuspiciousSessions($userId)
    {
        return AppSession::where('user_id', $userId)
            ->where('is_suspicious', true)
            ->orderBy('login_at', 'desc')
            ->get();
    }

    /**
     * Generate a device ID based on request details
     */
    private static function generateDeviceId(Request $request): string
    {
        $data = $request->ip() . $request->userAgent();
        return hash('sha256', $data);
    }

    /**
     * Extract browser from User Agent
     */
    private static function getBrowser($userAgent): string
    {
        if (preg_match('/Chrome/', $userAgent)) {
            return 'Chrome';
        } elseif (preg_match('/Safari/', $userAgent)) {
            return 'Safari';
        } elseif (preg_match('/Firefox/', $userAgent)) {
            return 'Firefox';
        } elseif (preg_match('/Edge/', $userAgent)) {
            return 'Edge';
        } elseif (preg_match('/Opera|OPR/', $userAgent)) {
            return 'Opera';
        }
        return 'Unknown';
    }

    /**
     * Extract platform from User Agent
     */
    private static function getPlatform($userAgent): string
    {
        if (preg_match('/Windows/', $userAgent)) {
            return 'Windows';
        } elseif (preg_match('/Mac/', $userAgent)) {
            return 'MacOS';
        } elseif (preg_match('/Linux/', $userAgent)) {
            return 'Linux';
        } elseif (preg_match('/iPhone/', $userAgent)) {
            return 'iPhone';
        } elseif (preg_match('/Android/', $userAgent)) {
            return 'Android';
        } elseif (preg_match('/iPad/', $userAgent)) {
            return 'iPad';
        }
        return 'Unknown';
    }
}