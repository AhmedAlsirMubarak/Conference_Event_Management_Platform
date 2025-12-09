<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AppSession;
use App\Services\SessionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    /**
     * Display list of all admin sessions
     */
    public function adminSessions()
    {
        $sessions = AppSession::whereHas('user', function ($query) {
            $query->where('role', 'admin');
        })->orderBy('login_at', 'desc')->paginate(15);

        return view('admin.sessions.index', compact('sessions'));
    }

    /**
     * Display current user's active sessions
     */
    public function mySessions(Request $request)
    {
        $user = Auth::user();
        $activeSessions = SessionService::getActiveSessions($user->id);
        $currentSessionId = session()->get('app_session_id');

        return view('admin.sessions.my-sessions', compact('activeSessions', 'currentSessionId'));
    }

    /**
     * Terminate a specific session
     */
    public function terminateSession(Request $request, $sessionId)
    {
        $user = Auth::user();
        $session = AppSession::find($sessionId);

        // Verify session belongs to user or user is admin
        if ($session->user_id !== $user->id && $user->role !== 'admin') {
            return redirect()->back()->withErrors('Unauthorized action.');
        }

        SessionService::terminateSession($sessionId, $session->user_id);

        return redirect()->back()->with('success', 'Session terminated successfully.');
    }

    /**
     * Terminate all other sessions for current user
     */
    public function terminateOtherSessions(Request $request)
    {
        $user = Auth::user();
        $currentSessionId = session()->get('app_session_id');

        SessionService::terminateOtherSessions($user->id, $currentSessionId);

        return redirect()->back()->with('success', 'All other sessions have been terminated.');
    }

    /**
     * Get session details
     */
    public function show($sessionId)
    {
        $session = AppSession::find($sessionId);

        if (!$session) {
            return redirect()->back()->withErrors('Session not found.');
        }

        $user = Auth::user();

        // Verify access
        if ($session->user_id !== $user->id && $user->role !== 'admin') {
            return redirect()->back()->withErrors('Unauthorized access.');
        }

        return view('admin.sessions.show', compact('session'));
    }

    /**
     * Get user's session activity history
     */
    public function activityHistory($userId = null)
    {
        $user = Auth::user();

        // Default to current user if not specified
        if (!$userId) {
            $userId = $user->id;
        }

        // Verify access
        if ($userId !== $user->id && $user->role !== 'admin') {
            return redirect()->back()->withErrors('Unauthorized access.');
        }

        $history = SessionService::getSessionHistory($userId, 100);
        $targetUser = \App\Models\User::find($userId);

        return view('admin.sessions.activity-history', compact('history', 'targetUser'));
    }

    /**
     * Get suspicious sessions
     */
    public function suspiciousSessions()
    {
        $user = Auth::user();

        // Only admins can view all suspicious sessions
        if ($user->role !== 'admin') {
            $sessions = SessionService::getSuspiciousSessions($user->id);
        } else {
            $sessions = AppSession::where('is_suspicious', true)
                ->orderBy('login_at', 'desc')
                ->paginate(15);
        }

        return view('admin.sessions.suspicious', compact('sessions'));
    }

    /**
     * Export session logs
     */
    public function exportLogs(Request $request)
    {
        $user = Auth::user();

        if ($user->role !== 'admin') {
            return redirect()->back()->withErrors('Only admins can export session logs.');
        }

        $sessions = AppSession::with('user')
            ->orderBy('login_at', 'desc')
            ->get();

        $csv = "User ID,User Email,IP Address,Browser,Platform,Login Time,Last Activity,Logout Time,Status\n";

        foreach ($sessions as $session) {
            $csv .= "{$session->user_id},{$session->user->email},{$session->ip_address},{$session->browser},{$session->platform},";
            $csv .= "{$session->login_at},{$session->last_activity_at},{$session->logout_at},";
            $csv .= ($session->is_active ? 'Active' : 'Inactive') . "\n";
        }

        return response($csv, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="session-logs.csv"'
        ]);
    }

    /**
     * Clear old sessions
     */
    public function clearOldSessions(Request $request)
    {
        $user = Auth::user();

        if ($user->role !== 'admin') {
            return redirect()->back()->withErrors('Only admins can clear old sessions.');
        }

        // Delete sessions older than 90 days
        $count = AppSession::where('logout_at', '<', now()->subDays(90))
            ->delete();

        return redirect()->back()->with('success', "Cleared {$count} old session records.");
    }
}
