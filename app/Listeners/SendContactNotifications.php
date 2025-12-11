<?php

namespace App\Listeners;

use App\Events\ContactSubmitted;
use App\Models\ContactNotification;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class SendContactNotifications
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ContactSubmitted $event)
    {
        try {
            $contact = $event->contact;
            
            // Get all users (both admin and regular users)
            $users = User::all();
            
            if ($users->count() > 0) {
                foreach ($users as $user) {
                    try {
                        // Create entry in contact_notifications table for each user
                        ContactNotification::create([
                            'user_id' => $user->id,
                            'contact_id' => $contact->id,
                            'contact_name' => $contact->Name,
                            'contact_email' => $contact->Email,
                            'contact_phone' => $contact->Phone,
                            'contact_company' => $contact->Company,
                            'read_at' => null,
                        ]);
                        
                        Log::info('Contact notification created via event listener', [
                            'user_id' => $user->id,
                            'contact_id' => $contact->id,
                        ]);
                    } catch (\Exception $notifyError) {
                        Log::error('Failed to create notification: ' . $notifyError->getMessage(), [
                            'user_id' => $user->id,
                            'contact_id' => $contact->id,
                        ]);
                    }
                }
            }
            
            Log::info('Contact notifications sent via event listener', [
                'contact_id' => $contact->id,
                'user_count' => $users->count(),
            ]);
        } catch (\Exception $e) {
            Log::error('Error in SendContactNotifications listener: ' . $e->getMessage());
        }
    }
}
