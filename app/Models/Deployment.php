<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deployment extends Model
{
    protected $fillable = [

        'project_id',

        'status',
        'method',
        'server',

        'version',
        'release_version',

        'build_number',
        'build_duration',

        'artifact_name',

        'git_pull_command',
        'composer_install_command',
        'npm_build_command',
        'migration_command',
        'cache_clear_command',

        'success_count',
        'failed_count',

        'deployed_at',

    ];

    protected $casts = [

        'deployed_at' => 'datetime',

    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
