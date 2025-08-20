<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Team extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function prompts(): BelongsToMany
    {
        return $this->belongsToMany(PromptCase::class, 'prompt_shares')
            ->withPivot('permission_level')
            ->withTimestamps();
    }
}