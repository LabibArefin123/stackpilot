<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {

            $table->id();

            /*
    |--------------------------------------------------------------------------
    | Basic Information
    |--------------------------------------------------------------------------
    */

            $table->string('name');

            $table->string('domain')->unique();

            /*
    |--------------------------------------------------------------------------
    | Git
    |--------------------------------------------------------------------------
    */

            $table->string('git_branch')->nullable();

            $table->string('default_branch')->nullable();

            $table->string('git_repository')->nullable();

            $table->string('git_status')->nullable();

            /*
    |--------------------------------------------------------------------------
    | Project
    |--------------------------------------------------------------------------
    */

            $table->string('project_type')->nullable();
            $table->string('project_path')->nullable();

            /*
    |--------------------------------------------------------------------------
    | Commit
    |--------------------------------------------------------------------------
    */

            $table->string('last_commit')->nullable();

            $table->timestamp('last_commit_date')->nullable();

            /*
    |--------------------------------------------------------------------------
    | Repository
    |--------------------------------------------------------------------------
    */

            $table->string('owner')->nullable();

            $table->string('visibility')->nullable();

            $table->boolean('is_private')->default(false);

            /*
    |--------------------------------------------------------------------------
    | Status
    |--------------------------------------------------------------------------
    */

            $table->boolean('is_active')->default(true);

            $table->timestamp('last_checked_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
