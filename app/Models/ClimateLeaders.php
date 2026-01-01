<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClimateLeaders extends Model
{
 protected $table = 'climate_leaders';
 protected $fillable = [
     'fullname',
     'email',
     'country_code',
     'phone',
     'Country_of_Nationality',
     'Country_of_Residence',   
     'organization',
     'bio',
     'linkedin_profile',
     'notes',
     'last_reviewed_at',
 ];

 protected $casts = [
     'last_reviewed_at' => 'datetime',
 ];
}