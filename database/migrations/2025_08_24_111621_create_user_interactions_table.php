<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('user_interactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('prompt_template_id')->constrained()->onDelete('cascade');
            $table->enum('interaction_type', ['LIKE', 'FAVORITE', 'DOWNLOAD', 'USE', 'SHARE', 'REPORT', 'VIEW']);
            $table->json('metadata')->nullable();
            $table->timestamps();
            
            $table->unique(['user_id', 'prompt_template_id', 'interaction_type'], 'uniq_user_interaction');
            $table->index(['prompt_template_id', 'interaction_type']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_interactions');
    }
};