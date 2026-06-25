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
        Schema::create('terminal_commands', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->nullable()->index();
            $table->text('command');
            $table->longText('output')->nullable();
            $table->integer('exit_code')->nullable();
            $table->boolean('success')->default(false);
            $table->string('executed_by')->nullable();
            $table->timestamp('executed_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('terminal_commands');
    }
};
