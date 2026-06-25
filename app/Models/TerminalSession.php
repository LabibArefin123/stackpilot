<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TerminalSession extends Model
{
    protected $fillable = [
        'project_id',
        'session_name',
        'started_at',
        'ended_at',
        'is_active'
    ];

    protected $casts = [
        'started_at' => 'datetime',
        'ended_at' => 'datetime',
        'is_active' => 'boolean'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
