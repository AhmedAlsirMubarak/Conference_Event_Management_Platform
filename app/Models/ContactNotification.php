<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactNotification extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'contact_id',
        'contact_name',
        'contact_email',
        'contact_phone',
        'contact_company',
        'read_at',
    ];

    protected $dates = [
        'read_at',
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function contact()
    {
        return $this->belongsTo(contacts::class);
    }

    public function markAsRead()
    {
        $this->update(['read_at' => now()]);
    }

    public function isUnread()
    {
        return is_null($this->read_at);
    }
}
