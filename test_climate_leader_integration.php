<?php

require 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Mail\ClimateLeaderSubmissionMail;
use App\Models\ClimateLeaders;
use App\Services\MicrosoftGraphMailService;
use Illuminate\Support\Facades\Mail;

try {
    echo "✅ CLIMATE LEADER EMAIL SYSTEM TEST\n";
    echo "====================================\n\n";

    // Create test climate leader
    $testLeader = new ClimateLeaders();
    $testLeader->fullname = 'Ahmed Al-Mansouri';
    $testLeader->email = 'info@birba.om';
    $testLeader->country_code = 'SA';
    $testLeader->phone = '+966501234567';
    $testLeader->Country_of_Nationality = 'Saudi Arabia';
    $testLeader->Country_of_Residence = 'Saudi Arabia';
    $testLeader->organization = 'Green Energy Initiative';
    $testLeader->bio = 'Environmental sustainability leader with 15 years of experience.';
    $testLeader->linkedin_profile = 'https://linkedin.com/in/ahmed-mansouri';
    $testLeader->notes = 'Strong candidate for climate leadership program';

    echo "📧 Test Details:\n";
    echo "- Recipient: {$testLeader->fullname}\n";
    echo "- Email: {$testLeader->email}\n";
    echo "- Organization: {$testLeader->organization}\n";
    echo "- From: " . config('mail.from.address') . "\n";
    echo "- Sender: " . config('mail.from.name') . "\n\n";

    echo "📤 Sending email via ClimateLeaderSubmissionMail...\n";
    
    // Method 1: Direct service call (recommended for control)
    echo "\n[Method 1] Using Microsoft Graph Service Directly:\n";
    $graphService = new MicrosoftGraphMailService();
    
    // Build the email body using a simple template
    $htmlBody = view('emails.climate-leader-submission', ['climateLeader' => $testLeader])->render();
    
    $graphService->sendMail(
        $testLeader->email,
        'Thank You for Your Climate Leaders Nomination - Saudi Climate Week 2026',
        $htmlBody
    );
    
    echo "✓ Email sent successfully via Graph API!\n";

    // Method 2: Using Laravel Mail facade (if you prefer)
    echo "\n[Method 2] Using Laravel Mail Facade:\n";
    Mail::send(new ClimateLeaderSubmissionMail($testLeader));
    echo "✓ Email queued successfully via Laravel Mail!\n";

    echo "\n" . str_repeat("=", 50) . "\n";
    echo "✅ EMAIL SYSTEM FULLY FUNCTIONAL\n";
    echo str_repeat("=", 50) . "\n";
    
    echo "\nWhat's Working:\n";
    echo "✓ Microsoft Graph API authentication\n";
    echo "✓ ClimateLeaderSubmissionMail class\n";
    echo "✓ Email template rendering\n";
    echo "✓ Climate leader data integration\n";
    echo "✓ Email delivery to Office 365\n";

    echo "\nNext Steps:\n";
    echo "1. Update your application to use ClimateLeaderSubmissionMail when processing submissions\n";
    echo "2. Integrate with your contact/nomination form submission handler\n";
    echo "3. Configure queue jobs for background email sending if needed\n";

} catch (Exception $e) {
    echo "❌ Error:\n";
    echo "Message: " . $e->getMessage() . "\n";
    exit(1);
}
