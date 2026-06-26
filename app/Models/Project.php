<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name',
        'domain',
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

    public function environment()
    {
        return $this->hasOne(ProjectEnvironment::class);
    }

    public function deployment()
    {
        return $this->hasOne(Deployment::class);
    }
}
