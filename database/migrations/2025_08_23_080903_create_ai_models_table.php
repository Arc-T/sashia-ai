<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('ai_models', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('vendor', 100)->nullable();
            $table->string('model_identifier', 255)->unique();
            $table->text('description')->nullable();
            $table->string('version', 50)->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            
            $table->index('is_active');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ai_models');
    }
};