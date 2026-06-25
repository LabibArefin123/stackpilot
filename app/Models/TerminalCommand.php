<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TerminalCommand extends Model
{
    protected $fillable = [
        'project_id',
        'command',
        'output',
        'exit_code',
        'success',
        'executed_by',
        'executed_at'
    ];

    protected $casts = [
        'success' => 'boolean',
        'executed_at' => 'datetime'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
