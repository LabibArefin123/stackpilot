<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactRequest extends Model
{
    use HasFactory;

    protected $table = 'contact_requests';

    /**
     * Mass assignable fields
     */
    protected $fillable = [
        'name',
        'phone',
        'email',
        'subject',
        'message',
        'type',        // appointment | contact
        'ip_address',
        'total_count',
    ];

    /**
     * Optional: helpful scopes
     */
    public function scopeAppointments($query)
    {
        return $query->where('type', 'appointment');
    }

    public function scopeContacts($query)
    {
        return $query->where('type', 'contact');
    }
}
