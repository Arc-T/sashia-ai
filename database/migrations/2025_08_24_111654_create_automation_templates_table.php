<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('automation_templates', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->text('description')->nullable();
            $table->foreignId('automation_id')->constrained()->onUpdate('cascade');
            $table->foreignId('category_id')->constrained()->onUpdate('cascade');
            $table->foreignId('user_id')->nullable()->constrained()->onUpdate('cascade');
            $table->timestamps();
            
            $table->index('automation_id');
            $table->index('category_id');
            $table->index('user_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('automation_templates');
    }
};