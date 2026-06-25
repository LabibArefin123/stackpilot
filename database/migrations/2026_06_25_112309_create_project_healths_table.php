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
        Schema::create('project_health', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->nullable()->index();
            $table->boolean('git_ok')->default(false);
            $table->boolean('composer_ok')->default(false);
            $table->boolean('node_ok')->default(false);
            $table->boolean('queue_ok')->default(false);
            $table->boolean('cron_ok')->default(false);
            $table->boolean('storage_link_ok')->default(false);
            $table->boolean('env_ok')->default(false);
            $table->integer('health_score')->default(0);
            $table->timestamp('checked_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_healths');
    }
};
