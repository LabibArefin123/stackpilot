<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectHealth extends Model
{
    protected $table = 'project_health';

    protected $fillable = [
        'project_id',
        'git_ok',
        'composer_ok',
        'node_ok',
        'queue_ok',
        'cron_ok',
        'storage_link_ok',
        'env_ok',
        'health_score',
        'checked_at'
    ];

    protected $casts = [
        'git_ok' => 'boolean',
        'composer_ok' => 'boolean',
        'node_ok' => 'boolean',
        'queue_ok' => 'boolean',
        'cron_ok' => 'boolean',
        'storage_link_ok' => 'boolean',
        'env_ok' => 'boolean',
        'checked_at' => 'datetime'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
