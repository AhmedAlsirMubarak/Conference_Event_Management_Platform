<?php

require 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Services\MicrosoftGraphMailService;
use App\Models\ClimateLeaders;

try {
    echo "Testing Microsoft Graph Mail Service\n";
    echo "=====================================\n\n";

    // Check configuration
    echo "Configuration Check:\n";
    echo "- Client ID: " . (config('services.graph.client_id') ? '✓ Set' : '✗ Missing') . "\n";
    echo "- Client Secret: " . (config('services.graph.client_secret') ? '✓ Set' : '✗ Missing') . "\n";
    echo "- Tenant ID: " . (config('services.graph.tenant_id') ? '✓ Set' : '✗ Missing') . "\n";
    echo "- From Address: " . config('mail.from.address') . "\n\n";

    if (!config('services.graph.client_id') || !config('services.graph.client_secret') || !config('services.graph.tenant_id')) {
        echo "❌ Configuration incomplete. Update .env with:\n";
        echo "   GRAPH_CLIENT_ID=your-value\n";
        echo "   GRAPH_CLIENT_SECRET=your-value\n";
        echo "   GRAPH_TENANT_ID=your-value\n";
        exit(1);
    }

    // Create test climate leader
    $testLeader = new ClimateLeaders();
    $testLeader->fullname = 'Test Climate Leader';
    $testLeader->email = 'info@birba.om';  // Use your domain
    $testLeader->country_code = 'SA';
    $testLeader->phone = '+966123456789';
    $testLeader->Country_of_Nationality = 'Saudi Arabia';
    $testLeader->Country_of_Residence = 'Saudi Arabia';
    $testLeader->organization = 'Test Organization';
    $testLeader->bio = 'This is a test climate leader nomination.';
    $testLeader->linkedin_profile = 'https://linkedin.com/in/test';
    $testLeader->notes = 'Test submission via Graph API';

    // Test email body (simple HTML for testing)
    $htmlBody = <<<HTML
    <div style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto;">
        <h2>Dear {$testLeader->fullname},</h2>
        <p>Thank you for submitting your nomination to become a Climate Leader at Saudi Climate Week 2026!</p>
        <p>We have successfully received your submission.</p>
        
        <h3>Submission Summary:</h3>
        <table style="width: 100%; border-collapse: collapse;">
            <tr>
                <td style="padding: 10px; border: 1px solid #ddd;"><strong>Name:</strong></td>
                <td style="padding: 10px; border: 1px solid #ddd;">{$testLeader->fullname}</td>
            </tr>
            <tr>
                <td style="padding: 10px; border: 1px solid #ddd;"><strong>Email:</strong></td>
                <td style="padding: 10px; border: 1px solid #ddd;">{$testLeader->email}</td>
            </tr>
            <tr>
                <td style="padding: 10px; border: 1px solid #ddd;"><strong>Organization:</strong></td>
                <td style="padding: 10px; border: 1px solid #ddd;">{$testLeader->organization}</td>
            </tr>
        </table>
        
        <p style="margin-top: 30px;">Best regards,<br><strong>Saudi Climate Week 2026 Team</strong></p>
    </div>
    HTML;

    echo "Sending test email via Microsoft Graph...\n";
    echo "To: {$testLeader->email}\n";
    echo "From: " . config('mail.from.address') . "\n\n";

    $graphService = new MicrosoftGraphMailService();
    $graphService->sendMail(
        $testLeader->email,
        'Test: Climate Leaders Nomination - Saudi Climate Week 2026',
        $htmlBody
    );

    echo "✓ Email sent successfully via Microsoft Graph API!\n";
    echo "\nThe email should appear in the inbox shortly.\n";

} catch (Exception $e) {
    echo "✗ Error:\n";
    echo "Message: " . $e->getMessage() . "\n";
    echo "\nCommon issues:\n";
    echo "1. Missing .env configuration (GRAPH_CLIENT_ID, GRAPH_CLIENT_SECRET, GRAPH_TENANT_ID)\n";
    echo "2. Invalid credentials\n";
    echo "3. App permissions not granted in Azure AD\n";
    echo "4. Network/connectivity issues\n";
    exit(1);
}
