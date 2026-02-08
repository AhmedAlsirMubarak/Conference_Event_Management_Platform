<?php

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\SponsorSubmission;

$submissions = SponsorSubmission::select('id', 'email_address', 'contact_person', 'organization_name')->get();

echo "Existing Sponsor Submissions:\n";
echo str_repeat("=", 80) . "\n";

foreach ($submissions as $sub) {
    echo "ID: {$sub->id} | Email: {$sub->email_address} | Name: {$sub->contact_person}\n";
}

echo str_repeat("=", 80) . "\n";
echo "Total: " . $submissions->count() . " submissions\n";
