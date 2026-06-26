<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('deployments', function (Blueprint $table) {

            $table->id();

            $table->foreignId('project_id')->nullable()->index();
            $table->string('status')->nullable();

            $table->string('method')->nullable();

            $table->string('server')->nullable();

            $table->string('version')->nullable();

            $table->string('release_version')->nullable();

            $table->string('build_number')->nullable();

            $table->string('build_duration')->nullable();

            $table->string('artifact_name')->nullable();

            $table->string('git_pull_command')->nullable();

            $table->string('composer_install_command')->nullable();

            $table->string('npm_build_command')->nullable();

            $table->string('migration_command')->nullable();

            $table->string('cache_clear_command')->nullable();

            $table->unsignedInteger('success_count')->default(0);

            $table->unsignedInteger('failed_count')->default(0);

            $table->timestamp('deployed_at')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('deployments');
    }
};
