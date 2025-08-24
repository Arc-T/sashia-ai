<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('submissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onUpdate('cascade');
            $table->foreignId('category_id')->constrained('submission_categories')->onUpdate('cascade');
            $table->string('submissible_type', 100);
            $table->unsignedBigInteger('submissible_id');
            $table->string('title', 255);
            $table->text('description')->nullable();
            $table->boolean('is_public')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            
            $table->unique(['submissible_type', 'submissible_id']);
            $table->index(['submissible_type', 'submissible_id']);
            $table->index('category_id');
            $table->index('user_id');
            $table->index(['is_public', 'is_active']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('submissions');
    }
};