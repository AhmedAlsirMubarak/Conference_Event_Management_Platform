<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AppSession extends Model
{
    use HasFactory;

    protected $table = 'app_sessions';

    protected $fillable = [
        'user_id',
        'session_token',
        'ip_address',
        'user_agent',
        'browser',
        'platform',
        'login_at',
        'last_activity_at',
        'logout_at',
        'is_active',
        'is_suspicious',
        'device_id',
    ];

    protected $casts = [
        'login_at' => 'datetime',
        'last_activity_at' => 'datetime',
        'logout_at' => 'datetime',
        'is_active' => 'boolean',
        'is_suspicious' => 'boolean',
    ];

    /**
     * Get the user that owns the session
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Mark session as logout
     */
    public function markAsLogout()
    {
        $this->update([
            'is_active' => false,
            'logout_at' => now(),
        ]);
    }

    /**
     * Update last activity
     */
    public function updateLastActivity()
    {
        $this->update(['last_activity_at' => now()]);
    }

    /**
     * Mark session as suspicious
     */
    public function markAsSuspicious()
    {
        $this->update(['is_suspicious' => true]);
    }

    /**
     * Get active sessions
     */
    public static function getActiveSessions($userId)
    {
        return self::where('user_id', $userId)
            ->where('is_active', true)
            ->orderBy('login_at', 'desc')
            ->get();
    }

    /**
     * Invalidate all other sessions for a user
     */
    public static function invalidateOtherSessions($userId, $currentSessionId = null)
    {
        $query = self::where('user_id', $userId)
            ->where('is_active', true);

        if ($currentSessionId) {
            $query->where('id', '!=', $currentSessionId);
        }

        return $query->update([
            'is_active' => false,
            'logout_at' => now(),
        ]);
    }

    /**
     * Get session activity
     */
    public static function getUserActivityLog($userId, $limit = 20)
    {
        return self::where('user_id', $userId)
            ->orderBy('login_at', 'desc')
            ->limit($limit)
            ->get();
    }
}
