<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpeakersSubmissions extends Model
{
    protected $table = 'speakers_submissions';

    protected $fillable = [
        'contact_person',
        'job_title',
        'organization_name',
        'email_address',
        'phone_number',
        'country',
        'speaker_biography',
    ];
}