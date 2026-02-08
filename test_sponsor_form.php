<?php

/**
 * Test script to verify sponsor form submission
 * This tests the complete flow: form submission -> database -> notifications
 */

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\SponsorSubmission;
use App\Models\User;
use App\Notifications\SponsorSubmissionNotification;
use Illuminate\Support\Facades\Notification;

echo "\n========================================\n";
echo "SPONSOR FORM SUBMISSION TEST\n";
echo "========================================\n\n";

// Test 1: Create a sponsor submission directly
echo "TEST 1: Creating sponsor submission...\n";

try {
    $submission = SponsorSubmission::create([
        'contact_person' => 'Test Sponsor Contact',
        'job_title' => 'Marketing Director',
        'organization_name' => 'Test Sponsor Company',
        'email_address' => 'test.sponsor.' . time() . '@example.com',
        'phone_number' => '+1234567890',
        'country' => 'US',
        'website' => 'https://www.testsponsor.com',
        'additional_comments' => 'This is a test sponsor submission to verify the system is working correctly.',
        'language' => 'en',
        'status' => 'pending'
    ]);
    
    echo "✓ Sponsor submission created successfully!\n";
    echo "  ID: {$submission->id}\n";
    echo "  Contact Person: {$submission->contact_person}\n";
    echo "  Organization: {$submission->organization_name}\n";
    echo "  Email: {$submission->email_address}\n\n";
} catch (\Exception $e) {
    echo "✗ Error creating submission: " . $e->getMessage() . "\n\n";
    exit(1);
}

// Test 2: Verify admin_notes column exists
echo "TEST 2: Testing admin_notes field...\n";

try {
    $submission->admin_notes = 'Test admin note added';
    $submission->save();
    
    echo "✓ Admin notes saved successfully!\n";
    echo "  Notes: {$submission->admin_notes}\n\n";
} catch (\Exception $e) {
    echo "✗ Error saving admin notes: " . $e->getMessage() . "\n\n";
}

// Test 3: Test notifications
echo "TEST 3: Testing notification system...\n";

try {
    // Get admin users
    $admins = User::where('role', 'admin')->get();
    echo "  Found {$admins->count()} admin user(s)\n";
    
    // Get the submitting user (we'll use the first user for testing)
    $user = User::first();
    
    if ($admins->count() > 0 && $user) {
        // Send notifications to admins
        foreach ($admins as $admin) {
            $admin->notify(new SponsorSubmissionNotification($submission, true));
        }
        echo "✓ Sent notifications to {$admins->count()} admin(s)\n";
        
        // Send notification to user
        $user->notify(new SponsorSubmissionNotification($submission, false));
        echo "✓ Sent notification to user: {$user->email}\n\n";
        
        // Check unread notifications
        $adminUnread = User::where('role', 'admin')->first()->unreadNotifications()->count();
        echo "  Admin has {$adminUnread} unread notification(s)\n";
        
    } else {
        echo "⚠ No admin users or regular users found. Skipping notification test.\n\n";
    }
} catch (\Exception $e) {
    echo "✗ Error with notifications: " . $e->getMessage() . "\n\n";
}

// Test 4: Verify database entry
echo "TEST 4: Verifying database entry...\n";

try {
    $retrieved = SponsorSubmission::find($submission->id);
    
    if ($retrieved) {
        echo "✓ Submission retrieved from database successfully!\n";
        echo "  All fields present: " . (
            $retrieved->contact_person && 
            $retrieved->organization_name && 
            $retrieved->email_address ? "Yes" : "No"
        ) . "\n\n";
    } else {
        echo "✗ Could not retrieve submission from database\n\n";
    }
} catch (\Exception $e) {
    echo "✗ Error retrieving from database: " . $e->getMessage() . "\n\n";
}

// Test 5: Check total submissions
echo "TEST 5: Checking total submissions...\n";

try {
    $total = SponsorSubmission::count();
    echo "✓ Total sponsor submissions in database: {$total}\n\n";
} catch (\Exception $e) {
    echo "✗ Error counting submissions: " . $e->getMessage() . "\n\n";
}

echo "========================================\n";
echo "TESTING COMPLETE\n";
echo "========================================\n\n";

echo "Next steps:\n";
echo "1. Visit http://127.0.0.1:8000/sponsors to see the form\n";
echo "2. Submit a test entry through the web form\n";
echo "3. Login as admin and check /admin/sponsor-submissions\n";
echo "4. Check notifications in the bell icon\n\n";

echo "Clean up: To delete the test submission, run:\n";
echo "php artisan tinker\n";
echo ">>> App\\Models\\SponsorSubmission::find({$submission->id})->delete();\n\n";
