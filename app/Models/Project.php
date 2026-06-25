<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name',
        'domain',
        'project_path',
        'php_version',
        'laravel_version',
        'server_ip',
        'git_branch',
        'git_repository',
        'is_active',
        'last_checked_at'
    ];

    public function commands()
    {
        return $this->hasMany(TerminalCommand::class);
    }

    public function sessions()
    {
        return $this->hasMany(TerminalSession::class);
    }

    public function health()
    {
        return $this->hasOne(ProjectHealth::class);
    }
}
