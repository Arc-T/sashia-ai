<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('ai_model_guides', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ai_model_id')->constrained()->onDelete('cascade');
            $table->string('title', 255);
            $table->text('content');
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->timestamps();
            
            $table->index('ai_model_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ai_model_guides');
    }
};