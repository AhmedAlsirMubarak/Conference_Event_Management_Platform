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
                return response()->json(['count' => 0, 'notifications' => []]);
            }

            // Fetch all unread notifications with a single query
            $unreadNotifications = ContactNotification::where('user_id', $user->id)
                ->whereNull('read_at')
                ->latest()
                ->limit(50)
                ->get();
            
            // Get count from collection
            $unreadCount = count($unreadNotifications);
            
            // Map notifications to safe response format
            $notifications = [];
            if ($unreadCount > 0) {
                foreach ($unreadNotifications as $notification) {
                    $createdAt = '';
                    if ($notification->created_at) {
                        try {
                            $createdAt = $notification->created_at->diffForHumans();
                        } catch (\Exception $e) {
                            $createdAt = 'Just now';
                        }
                    }
                    
                    $notifications[] = [
                        'id' => $notification->id ?? 0,
                        'type' => 'ContactSubmission',
                        'data' => [
                            'contact_id' => $notification->contact_id ?? 0,
                            'contact_name' => $notification->contact_name ?? 'Unknown',
                            'contact_email' => $notification->contact_email ?? '',
                            'contact_phone' => $notification->contact_phone ?? '',
                            'contact_company' => $notification->contact_company ?? '',
                        ],
                        'created_at' => $createdAt,
                    ];
                }
            }
            
            return response()->json([
                'count' => $unreadCount,
                'notifications' => $notifications,
            ]);
        } catch (\Throwable $e) {
            try {
                Log::error('Error fetching notifications', [
                    'message' => $e->getMessage(),
                    'user_id' => Auth::id()
                ]);
            } catch (\Throwable $logError) {
                // Silently fail if logging fails
            }
            
            return response()->json(['count' => 0, 'notifications' => []], 500);
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