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
            $table->unsignedInteger('id', true);
            $table->unsignedInteger('user_id');
            $table->string('title', 255);
            $table->text('description')->nullable();
            $table->text('content')->comment('The actual prompt text');
            $table->string('ai_model_ids', 50)->comment('The models this prompt is optimized for');
            $table->unsignedInteger('is_favorite');
            $table->timestamps();

            // Indexes
            $table->index('user_id', 'idx_user_prompts_user_id');
            $table->fullText(['title', 'content'], 'ft_user_prompts_title_content');

            // Foreign key
            $table->foreign('user_id', 'fk_user_prompts_user_id')
                  ->references('id')
                  ->on('users')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_prompts', function (Blueprint $table) {
            $table->dropForeign('fk_user_prompts_user_id');
        });
        
        Schema::dropIfExists('user_prompts');
    }
};