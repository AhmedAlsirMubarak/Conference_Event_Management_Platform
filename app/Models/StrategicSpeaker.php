<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StrategicSpeaker extends Model
{
    protected $fillable = ['name', 'title', 'company', 'photo', 'logo', 'bio'];
}
