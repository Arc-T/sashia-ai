<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Main media table (could be images or videos)
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->enum('type', ['image', 'video', 'audio', 'document']);
            $table->string('path'); // Main file path
            $table->string('thumbnail_path')->nullable();
            $table->string('file_format');
            $table->integer('file_size')->comment('Size in KB');
            $table->string('license')->default('free');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });

        // Media-specific details (polymorphic)
        Schema::create('media_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('media_id');
            $table->string('media_type');
            $table->json('details'); // Stores type-specific attributes
            $table->timestamps();

            $table->foreign('media_id')->references('id')->on('media')->onDelete('cascade');
        });

        // Polymorphic statistics table
        Schema::create('media_stats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('media_id');
            $table->string('media_type'); // 'image', 'video', etc.
            $table->unsignedBigInteger('views')->default(0);
            $table->unsignedBigInteger('downloads')->default(0);
            $table->unsignedBigInteger('likes')->default(0);
            $table->unsignedBigInteger('saves')->default(0);
            $table->unsignedBigInteger('shares')->default(0);
            $table->timestamps();

            $table->index(['media_id', 'media_type']);
        });

        // Categories table (now media-agnostic)
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->timestamps();
        });

        // Media-Category relationship
        Schema::create('category_media', function (Blueprint $table) {
            $table->foreignId('media_id')->constrained()->onDelete('cascade');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->primary(['media_id', 'category_id']);
        });

        // Tags table
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->timestamps();
        });

        // Media-Tag relationship
        Schema::create('media_tag', function (Blueprint $table) {
            $table->foreignId('media_id')->constrained()->onDelete('cascade');
            $table->foreignId('tag_id')->constrained()->onDelete('cascade');
            $table->primary(['media_id', 'tag_id']);
        });

        // User actions tracking
        Schema::create('media_user_actions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('media_id');
            $table->string('media_type');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->enum('action_type', ['view', 'like', 'download', 'share', 'save']);
            $table->ipAddress('ip_address')->nullable();
            $table->text('user_agent')->nullable();
            $table->timestamps();

            $table->index(['media_id', 'media_type']);
            $table->index(['user_id', 'action_type']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('media_user_actions');
        Schema::dropIfExists('media_tag');
        Schema::dropIfExists('tags');
        Schema::dropIfExists('category_media');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('media_stats');
        Schema::dropIfExists('media_details');
        Schema::dropIfExists('media');
    }
};
