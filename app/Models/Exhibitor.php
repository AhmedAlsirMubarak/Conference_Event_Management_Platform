<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exhibitor extends Model
{
    protected $table = 'exhibitor';
    protected $fillable = ['name', 'logo', 'website'];
}