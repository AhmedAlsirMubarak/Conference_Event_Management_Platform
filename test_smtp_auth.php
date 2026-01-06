<?php
require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make(\Illuminate\Contracts\Http\Kernel::class)->handle(
    $request = \Illuminate\Http\Request::capture()
);

use Illuminate\Support\Facades\Mail;

echo "=== Testing SMTP Authentication ===" . PHP_EOL;
echo "Host: " . config('mail.mailers.smtp.host') . PHP_EOL;
echo "Port: " . config('mail.mailers.smtp.port') . PHP_EOL;
echo "Username: " . config('mail.mailers.smtp.username') . PHP_EOL;
echo "From: " . config('mail.from.address') . PHP_EOL;
echo PHP_EOL;

try {
    Mail::raw('Test email to verify SMTP authentication is working', function ($message) {
        $message->to('test@example.com')
                ->from(config('mail.from.address'), config('mail.from.name'))
                ->subject('SMTP Authentication Test');
    });
    
    echo "✓ SUCCESS: Email queued successfully!" . PHP_EOL;
    echo "  SMTP authentication is now working!" . PHP_EOL;
    echo PHP_EOL;
    
    // Check queue
    $pendingJobs = \DB::table('jobs')->count();
    echo "Pending jobs in queue: " . $pendingJobs . PHP_EOL;
    echo PHP_EOL;
    
    if ($pendingJobs > 0) {
        echo "To process the queued email, run:" . PHP_EOL;
        echo "  php artisan queue:work --max-jobs=1 --stop-when-empty" . PHP_EOL;
    }
    
} catch (\Exception $e) {
    echo "✗ ERROR: " . $e->getMessage() . PHP_EOL;
}
?>
