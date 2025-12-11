<?php

namespace App\Models;

use App\Events\ContactSubmitted;
use Illuminate\Database\Eloquent\Model;

class contacts extends Model
{
    protected $fillable = [
        'Name',
        'Email',
        'Phone',
        'Designation',
        'Company',
        'Website',
        'notes',
        'last_communicated_at'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'last_communicated_at' => 'datetime',
    ];

    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'created' => ContactSubmitted::class,
    ];
}