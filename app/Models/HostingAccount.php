<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HostingAccount extends Model
{
    protected $fillable = [
        'name',
        'provider',
        'host',
        'port',
        'username',
        'private_key_path',
        'default_project_path',
        'description',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];
}
