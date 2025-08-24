<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->string('file_name', 255);
            $table->string('file_path', 500);
            $table->string('file_url', 500);
            $table->string('mime_type', 100);
            $table->unsignedInteger('file_size')->nullable();
            $table->json('metadata')->nullable();
            $table->string('resource_type', 50);
            $table->unsignedBigInteger('resource_id');
            $table->string('resource_entity', 50);
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->timestamps();
            
            $table->index(['resource_entity', 'resource_id']);
            $table->index('resource_type');
        });
    }

    public function down()
    {
        Schema::dropIfExists('media');
    }
};