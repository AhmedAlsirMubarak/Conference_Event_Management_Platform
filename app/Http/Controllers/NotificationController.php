<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\ContactNotification;

class NotificationController extends Controller
{
    /**
     * Display admin notifications page
     */
    public function adminIndex()
    {
        return view('admin.notifications.index');
    }

    /**
     * Display user notifications page
     */
    public function userIndex()
    {
        return view('user.notifications.index');
    }

    /**
     * Get all notifications for the authenticated user
     */
    public function getAll()
    {
        try {
            $user = Auth::user();
            
            if (!$user) {
                return response()->json(['notifications' => []], 401);
            }

            // Fetch all notifications (read and unread)
            $allNotifications = ContactNotification::where('user_id', $user->id)
                ->latest()
                ->paginate(20);
            
            return response()->json([
                'notifications' => $allNotifications->items(),
                'total' => $allNotifications->total(),
                'current_page' => $allNotifications->currentPage(),
                'last_page' => $allNotifications->lastPage(),
            ]);
        } catch (\Exception $e) {
            Log::error('Error fetching all notifications: ' . $e->getMessage(), [
                'user_id' => Auth::id()
            ]);
            return response()->json([
                'error' => 'Failed to load notifications'
            ], 500);
        }
    }

    /**
     * Get unread notifications for the authenticated user
     */
    public function getUnread()
    {
        try {
            $user = Auth::user();
            
            if (!$user) {
                return response()->json(['count' => 0, 'notifications' => []], 401);
            }

            Log::info('Getting unread notifications', [
                'user_id' => $user->id,
                'user_name' => $user->name,
                'user_role' => $user->role,
            ]);

            // Fetch from contact_notifications table for reliable storage
            $unreadNotifications = ContactNotification::where('user_id', $user->id)
                ->whereNull('read_at')
                ->latest()
                ->limit(10)
                ->get();
            
            $unreadCount = ContactNotification::where('user_id', $user->id)
                ->whereNull('read_at')
                ->count();
            
            return response()->json([
                'count' => $unreadCount,
                'notifications' => $unreadNotifications->map(function ($notification) {
                    return [
                        'id' => $notification->id,
                        'type' => 'ContactSubmission',
                        'data' => [
                            'contact_id' => $notification->contact_id,
                            'contact_name' => $notification->contact_name ?? 'Unknown',
                            'contact_email' => $notification->contact_email ?? '',
                            'contact_phone' => $notification->contact_phone ?? '',
                            'contact_company' => $notification->contact_company ?? '',
                        ],
                        'created_at' => $notification->created_at ? $notification->created_at->diffForHumans() : 'Just now',
                    ];
                }),
            ]);
        } catch (\Exception $e) {
            Log::error('Error fetching notifications: ' . $e->getMessage(), [
                'user_id' => Auth::id()
            ]);
            return response()->json([
                'error' => 'Failed to load notifications'
            ], 500);
        }
    }

    /**
     * Mark all admin notifications as read
     */
    public function markAllAsReadAdmin()
    {
        try {
            $user = Auth::user();
            if (!$user) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }

            $updated = ContactNotification::where('user_id', $user->id)
                ->whereNull('read_at')
                ->update(['read_at' => now()]);
            
            Log::info('Admin notifications marked as read', [
                'user_id' => $user->id,
                'user_name' => $user->name,
                'user_role' => $user->role,
                'updated_count' => $updated,
            ]);
            
            return response()->json(['success' => true, 'updated' => $updated]);
        } catch (\Exception $e) {
            Log::error('Error marking admin notifications as read: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to mark all as read'], 500);
        }
    }

    /**
     * Mark all user notifications as read
     */
    public function markAllAsReadUser()
    {
        try {
            $user = Auth::user();
            if (!$user) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }

            $updated = ContactNotification::where('user_id', $user->id)
                ->whereNull('read_at')
                ->update(['read_at' => now()]);
            
            Log::info('User notifications marked as read', [
                'user_id' => $user->id,
                'user_name' => $user->name,
                'user_role' => $user->role,
                'updated_count' => $updated,
            ]);
            
            return response()->json(['success' => true, 'updated' => $updated]);
        } catch (\Exception $e) {
            Log::error('Error marking user notifications as read: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to mark all as read'], 500);
        }
    }

    /**
     * Delete a notification
     */
    public function delete($id)
    {
        try {
            $user = Auth::user();
            if (!$user) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }

            $notification = ContactNotification::where('user_id', $user->id)
                ->where('id', $id)
                ->first();
            
            if ($notification) {
                $notification->delete();
            }

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            Log::error('Error deleting notification: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to delete notification'], 500);
        }
    }
}