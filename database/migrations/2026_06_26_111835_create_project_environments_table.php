<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('project_environments', function (Blueprint $table) {

            $table->id();

            $table->foreignId('project_id')->nullable()->index();
            /*
            |--------------------------------------------------------------------------
            | Environment
            |--------------------------------------------------------------------------
            */

            $table->enum('environment', [
                'local',
                'staging',
                'production'
            ])->default('production');

            /*
            |--------------------------------------------------------------------------
            | Paths
            |--------------------------------------------------------------------------
            */

            $table->string('project_path');

            $table->string('public_path')->nullable();

            /*
            |--------------------------------------------------------------------------
            | Server
            |--------------------------------------------------------------------------
            */

            $table->string('server_ip')->nullable();

            $table->string('server_name')->nullable();

            $table->string('hosting_provider')->nullable();

            /*
            |--------------------------------------------------------------------------
            | PHP
            |--------------------------------------------------------------------------
            */

            $table->string('php_version')->nullable();

            $table->string('php_binary')
                ->default('/usr/bin/php');

            /*
            |--------------------------------------------------------------------------
            | Composer
            |--------------------------------------------------------------------------
            */

            $table->string('composer_binary')
                ->default('/usr/local/bin/composer');

            /*
            |--------------------------------------------------------------------------
            | Node
            |--------------------------------------------------------------------------
            */

            $table->string('node_version')->nullable();

            $table->string('node_binary')
                ->nullable();

            $table->string('npm_binary')
                ->nullable();

            /*
            |--------------------------------------------------------------------------
            | Laravel
            |--------------------------------------------------------------------------
            */

            $table->string('laravel_version')->nullable();

            /*
            |--------------------------------------------------------------------------
            | SSH
            |--------------------------------------------------------------------------
            */

            $table->string('ssh_user')->nullable();

            $table->integer('ssh_port')->default(22);

            /*
            |--------------------------------------------------------------------------
            | Status
            |--------------------------------------------------------------------------
            */

            $table->timestamp('last_checked_at')->nullable();

            $table->boolean('is_default')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('project_environments');
    }
};
