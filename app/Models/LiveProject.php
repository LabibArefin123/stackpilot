<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LiveProject extends Model
{
    protected $fillable = [
        'project_name',
        'domain',
        'api_name',
    ];
}
