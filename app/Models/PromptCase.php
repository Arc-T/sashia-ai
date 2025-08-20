<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class PromptCase extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'content',
        'category_id',
        'color',
        'is_favorite',
        'user_id'
    ];

    protected $casts = [
        'is_favorite' => 'boolean',
        'created_at' => 'datetime:Y/m/d',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(PromptTag::class, 'prompt_tag_pivot');
    }

    public function teams(): BelongsToMany
    {
        return $this->belongsToMany(Team::class, 'prompt_shares')
            ->withPivot('permission_level')
            ->withTimestamps();
    }

    public function usageStats()
    {
        return $this->hasMany(PromptUsageStat::class);
    }

    public function scopeFavorite($query)
    {
        return $query->where('is_favorite', true);
    }

    public function scopeByCategory($query, $categoryId)
    {
        return $query->where('category_id', $categoryId);
    }

    public function scopeSearch($query, $searchTerm)
    {
        return $query->where('title', 'like', "%{$searchTerm}%")
            ->orWhere('content', 'like', "%{$searchTerm}%");
    }
}
