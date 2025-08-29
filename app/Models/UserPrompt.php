<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserPrompt extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_prompts';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'content',
        'ai_model_ids',
        'is_favorite',
        'category_id'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_favorite' => 'boolean', // Cast to boolean for easier handling
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the user that owns the prompt.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the user that owns the prompt.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    /**
     * Get AI model IDs as an array.
     * Converts comma-separated string to array.
     */
    public function getAiModelIdsArrayAttribute(): array
    {
        return array_filter(explode(',', $this->ai_model_ids));
    }

    /**
     * Set AI model IDs from an array.
     * Converts array to comma-separated string.
     */
    public function setAiModelIdsArrayAttribute(array $value): void
    {
        $this->attributes['ai_model_ids'] = implode(',', array_filter($value));
    }

    /**
     * Scope a query to only include favorite prompts.
     */
    public function scopeFavorite($query)
    {
        return $query->where('is_favorite', true);
    }

    /**
     * Scope a query to search in title and content.
     */
    public function scopeSearch($query, string $searchTerm)
    {
        return $query->where(function ($q) use ($searchTerm) {
            $q->whereFullText(['title', 'content'], $searchTerm)
                ->orWhere('title', 'like', "%{$searchTerm}%")
                ->orWhere('content', 'like', "%{$searchTerm}%");
        });
    }

    /**
     * Scope a query to filter by user.
     */
    public function scopeByUser($query, int $userId)
    {
        return $query->where('user_id', $userId);
    }

    /**
     * Scope a query to filter by AI model.
     */
    public function scopeByAiModel($query, string $modelId)
    {
        return $query->where('ai_model_ids', 'like', "%{$modelId}%");
    }
}
