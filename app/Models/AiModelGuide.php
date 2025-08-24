<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AIModelGuide extends Model
{
    use HasFactory;

    protected $table = 'ai_model_guides';

    protected $fillable = [
        'ai_model_id',
        'title',
        'content',
        'sort_order',
    ];

    public function aiModel()
    {
        return $this->belongsTo(AIModel::class);
    }
}