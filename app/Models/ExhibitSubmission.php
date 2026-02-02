<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExhibitSubmission extends Model
{
    protected $table = 'exhibit_submissions';

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
    ];
}
