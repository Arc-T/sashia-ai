<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInteraction extends Model
{
    use HasFactory;

    protected $table = 'user_interactions';

    protected $fillable = [
        'user_id',
        'prompt_template_id',
        'interaction_type',
        'metadata',
    ];

    protected $casts = [
        'metadata' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function promptTemplate()
    {
        return $this->belongsTo(PromptTemplate::class);
    }
}