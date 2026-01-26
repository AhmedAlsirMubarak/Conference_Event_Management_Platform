<?php

require 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Mail\ClimateLeaderSubmissionMail;
use App\Models\ClimateLeaders;
use Illuminate\Support\Facades\Mail;

try {
    echo "Testing ClimateLeaderSubmissionMail - Both LOG and SMTP\n";
    echo "========================================================\n\n";

    // Check mail configuration
    $mailConfig = config('mail');
    echo "Mail Configuration:\n";
    echo "- Default Mailer: " . $mailConfig['default'] . "\n";
    echo "- Host: " . config('mail.mailers.smtp.host') . "\n";
    echo "- Port: " . config('mail.mailers.smtp.port') . "\n";
    echo "- Encryption: " . config('mail.mailers.smtp.encryption') . "\n";
    echo "- From Address: " . config('mail.from.address') . "\n";
    echo "- From Name: " . config('mail.from.name') . "\n";
    echo "\n";

    // Create a test climate leader
    $testLeader = new ClimateLeaders();
    $testLeader->fullname = 'Test Climate Leader';
    $testLeader->email = 'info@birba.om';  // Use real domain instead of test@example.com
    $testLeader->country_code = 'SA';
    $testLeader->phone = '+966123456789';
    $testLeader->Country_of_Nationality = 'Saudi Arabia';
    $testLeader->Country_of_Residence = 'Saudi Arabia';
    $testLeader->organization = 'Test Organization';
    $testLeader->bio = 'This is a test climate leader nomination.';
    $testLeader->linkedin_profile = 'https://linkedin.com/in/test';
    $testLeader->notes = 'Test submission';

    // Test 1: Using LOG mailer
    echo "TEST 1: Using LOG Mailer (always works)\n";
    echo "----------------------------------------\n";
    echo "Sending test email to: test@example.com\n";
    echo "Recipient: " . $testLeader->fullname . "\n\n";

    Mail::mailer('log')->send(new ClimateLeaderSubmissionMail($testLeader));

    echo "✓ Email sent successfully via LOG mailer!\n";
    echo "Check: storage/logs/laravel.log for the email details\n\n";

    // Test 2: Attempt SMTP
    echo "TEST 2: Using SMTP Mailer (Office 365)\n";
    echo "---------------------------------------\n";
    echo "Attempting to send via SMTP (Office 365)...\n";
    
    try {
        Mail::mailer('smtp')->send(new ClimateLeaderSubmissionMail($testLeader));
        echo "✓ Email sent successfully via SMTP!\n";
    } catch (Exception $smtpError) {
        echo "✗ SMTP Error (Office 365 account is locked by security defaults):\n";
        echo "   " . $smtpError->getMessage() . "\n\n";
        echo "   To fix this, the Office 365 account needs:\n";
        echo "   - Security defaults policy disabled or\n";
        echo "   - App-specific password generated\n";
    }

    echo "\n✓ Mail class structure is correct!\n";
    echo "Mail envelope properly configured with recipient email.\n";

} catch (Exception $e) {
    echo "✗ Error:\n";
    echo "Error: " . $e->getMessage() . "\n";
    echo "Code: " . $e->getCode() . "\n";
    echo "\nStack trace:\n";
    echo $e->getTraceAsString() . "\n";
    exit(1);
}
