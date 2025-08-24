<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromptTemplate extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'content',
        'ai_model_id',
        'category_id',
        'user_id',
        'total_likes',
        'total_views',
        'is_public',
        'is_active',
    ];

    protected $casts = [
        'is_public' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function aiModel()
    {
        return $this->belongsTo(AIModel::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->morphToMany(PromptTag::class, 'taggable');
    }

    public function interactions()
    {
        return $this->hasMany(UserInteraction::class);
    }

    public function media()
    {
        return $this->morphMany(Media::class, 'resource', 'resource_entity', 'resource_id');
    }

    public function submissions()
    {
        return $this->morphMany(Submission::class, 'submissible');
    }
}