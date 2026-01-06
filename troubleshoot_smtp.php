<?php
require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make(\Illuminate\Contracts\Http\Kernel::class)->handle(
    $request = \Illuminate\Http\Request::capture()
);

echo "=== Office365 SMTP Troubleshooting ===" . PHP_EOL . PHP_EOL;

$config = [
    'Host' => config('mail.mailers.smtp.host'),
    'Port' => config('mail.mailers.smtp.port'),
    'Username' => config('mail.mailers.smtp.username'),
    'Encryption' => config('mail.mailers.smtp.encryption'),
    'Verify Peer' => config('mail.mailers.smtp.verify_peer') ? 'false' : 'true',
];

echo "Configuration:" . PHP_EOL;
foreach ($config as $key => $value) {
    echo "  $key: $value" . PHP_EOL;
}

echo PHP_EOL . "Checking credentials..." . PHP_EOL;

// Test SMTP connection manually
$host = config('mail.mailers.smtp.host');
$port = config('mail.mailers.smtp.port');
$timeout = 10;

echo "  Connecting to $host:$port..." . PHP_EOL;

$sock = @fsockopen($host, $port, $errno, $errstr, $timeout);

if ($sock) {
    echo "  ✓ Connected to SMTP server" . PHP_EOL;
    $response = fgets($sock);
    echo "  Server: " . trim($response) . PHP_EOL;
    fclose($sock);
    
    echo PHP_EOL . "✓ SMTP Server is reachable" . PHP_EOL;
    echo PHP_EOL . "Next steps to fix authentication:" . PHP_EOL;
    echo "1. Go to: https://admin.microsoft.com" . PHP_EOL;
    echo "2. Settings → Mail flow" . PHP_EOL;
    echo "3. SMTP submission: Make sure it's ON for your tenant" . PHP_EOL;
    echo "4. Wait 15-30 minutes for changes to propagate" . PHP_EOL;
    echo "5. If using App Password, verify the password is correct" . PHP_EOL;
    echo "6. Run this test again after 30 minutes" . PHP_EOL;
    
} else {
    echo "  ✗ Could not connect to SMTP server" . PHP_EOL;
    echo "  Error: " . $errstr . " (Code: " . $errno . ")" . PHP_EOL;
}

echo PHP_EOL;
?>
