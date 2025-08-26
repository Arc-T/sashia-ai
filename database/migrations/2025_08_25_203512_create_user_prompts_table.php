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
        Schema::create('user_prompts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onUpdate('cascade');
            $table->string('title', 255);
            $table->text('description')->nullable();
            $table->text('content')->comment('The actual prompt text');
            $table->foreignId('category_id')->constrained()->onUpdate('cascade')->comment('prompt category id');
            $table->string('ai_model_ids', 50)->comment('The models this prompt is optimized for');
            $table->unsignedInteger('is_favorite');
            $table->timestamps();

            // Indexes
            $table->index('category_id');
            $table->index('user_id');
            $table->fullText(['title', 'content']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_prompts');
    }
};