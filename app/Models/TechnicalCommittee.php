<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TechnicalCommittee extends Model
{
    protected $fillable = ['name', 'title', 'Company','photo' , 'logo','bio'];
}