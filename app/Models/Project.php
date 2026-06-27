<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [

        'name',
        'domain',

        'git_branch',
        'default_branch',
        'git_repository',
        'git_status',

        'project_type',

        'last_commit',
        'last_commit_date',

        'owner',
        'visibility',
        'is_private',

        'is_active',
        'last_checked_at',

    ];

    protected $casts = [

        'is_active'        => 'boolean',
        'is_private'       => 'boolean',

        'last_checked_at'  => 'datetime',
        'last_commit_date' => 'datetime',

    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

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