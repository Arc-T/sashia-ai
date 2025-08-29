<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('taggables', function (Blueprint $table) {
            $table->foreignId('tag_id')->constrained('tags')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('taggable_id');
            $table->string('taggable_type', 255);
            
            $table->primary(['tag_id', 'taggable_id', 'taggable_type']);
            $table->index(['taggable_id', 'taggable_type']);
            $table->index('taggable_type');
        });
    }

    public function down()
    {
        Schema::dropIfExists('taggables');
    }
};