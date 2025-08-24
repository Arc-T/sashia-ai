<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AIModel extends Model
{
    use HasFactory;

    protected $table = 'ai_models';

    protected $fillable = [
        'name',
        'vendor',
        'model_identifier',
        'description',
        'version',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function guides()
    {
        return $this->hasMany(AIModelGuide::class);
    }

    public function promptTemplates()
    {
        return $this->hasMany(PromptTemplate::class);
    }
}