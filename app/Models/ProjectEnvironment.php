<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectEnvironment extends Model
{
    protected $fillable = [

        'project_id',

        'environment',

        'project_path',

        'public_path',

        'server_ip',

        'server_name',

        'hosting_provider',

        'php_version',

        'php_binary',

        'composer_binary',

        'node_version',

        'node_binary',

        'npm_binary',

        'laravel_version',

        'ssh_user',

        'ssh_port',

        'last_checked_at',

        'is_default',

    ];

    protected $casts = [

        'last_checked_at' => 'datetime',

        'is_default' => 'boolean',

    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
