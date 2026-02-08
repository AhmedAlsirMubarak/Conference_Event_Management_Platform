<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SponsorSubmission extends Model
{
    protected $table = 'sponsor_submissions';
    protected $fillable = [
        'contact_person',
        'job_title',
        'organization_name',
        'email_address',
        'phone_number',
        'country',
        'website',
        'additional_comments',
        'admin_notes',
        'language',
        'status',
    ];

    public $timestamps = true;
}
