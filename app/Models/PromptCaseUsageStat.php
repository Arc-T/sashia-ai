<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PromptCaseUsageStat extends Model
{
    use HasFactory;

    protected $fillable = [
        'prompt_id',
        'user_id',
        'usage_count',
        'last_used_at'
    ];

    protected $casts = [
        'last_used_at' => 'datetime',
    ];
}
