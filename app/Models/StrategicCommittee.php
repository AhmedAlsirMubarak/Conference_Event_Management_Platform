<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StrategicCommittee extends Model
{
    protected $fillable = ['name', 'title', 'Company','photo' , 'logo','bio'];
    
}