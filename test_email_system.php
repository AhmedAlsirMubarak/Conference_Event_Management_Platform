<?php
require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make(\Illuminate\Contracts\Http\Kernel::class)->handle(
    $request = \Illuminate\Http\Request::capture()
);

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

echo "=== Email Configuration Test ===" . PHP_EOL;
echo "Mailer: " . config('mail.default') . PHP_EOL;
echo "Host: " . config('mail.mailers.smtp.host') . PHP_EOL;
echo "Port: " . config('mail.mailers.smtp.port') . PHP_EOL;
echo "From: " . config('mail.from.address') . PHP_EOL;
echo "Queue Connection: " . config('queue.default') . PHP_EOL;
echo PHP_EOL;

echo "Testing email queue..." . PHP_EOL;

try {
    // Queue a test email
    Mail::raw('This is a test email to verify the climate leader submission email system is working.', function ($message) {
        $message->to('test@example.com')
                ->from(config('mail.from.address'), config('mail.from.name'))
                ->subject('Test Email - Climate Leader System');
    });
    
    echo "✓ SUCCESS: Email queued to job queue" . PHP_EOL;
    echo "  Jobs are stored in database and will be processed by queue worker" . PHP_EOL;
    echo "  Run: php artisan queue:work" . PHP_EOL;
    echo PHP_EOL;
    
    // Check if there are jobs in the queue
    $pendingJobs = \DB::table('jobs')->count();
    echo "Pending jobs in queue: " . $pendingJobs . PHP_EOL;
    
} catch (\Exception $e) {
    echo "✗ ERROR: " . $e->getMessage() . PHP_EOL;
}

echo PHP_EOL . "=== Climate Leader Submission Email Test ===" . PHP_EOL;

try {
    // Create a test climate leader
    $testLeader = new \App\Models\ClimateLeaders([
        'fullname' => 'Test User',
        'email' => 'test@example.com',
        'country_code' => '+1',
        'phone' => '5551234567',
        'Country_of_Nationality' => 'United States',
        'Country_of_Residence' => 'United States',
        'organization' => 'Test Organization',
        'bio' => 'This is a test bio',
        'linkedin_profile' => null,
    ]);
    
    // Queue the submission email
    Mail::to($testLeader->email)->queue(new \App\Mail\ClimateLeaderSubmissionMail($testLeader));
    
    echo "✓ SUCCESS: Climate Leader submission email queued" . PHP_EOL;
    echo "  Recipient: " . $testLeader->email . PHP_EOL;
    echo "  Subject: New Climate Leaders Nomination" . PHP_EOL;
    
} catch (\Exception $e) {
    echo "✗ ERROR: " . $e->getMessage() . PHP_EOL;
}

echo PHP_EOL . "=== Queue Status ===" . PHP_EOL;
$pendingJobs = \DB::table('jobs')->count();
$failedJobs = \DB::table('failed_jobs')->count();

echo "Pending jobs: " . $pendingJobs . PHP_EOL;
echo "Failed jobs: " . $failedJobs . PHP_EOL;

if ($pendingJobs > 0) {
    echo PHP_EOL . "To process queued emails, run:" . PHP_EOL;
    echo "  php artisan queue:work" . PHP_EOL;
}

echo PHP_EOL . "✓ Test completed!" . PHP_EOL;
?>
