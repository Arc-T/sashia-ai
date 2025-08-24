<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromptTag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function promptTemplates()
    {
        return $this->morphedByMany(PromptTemplate::class, 'taggable');
    }

    public function automationTemplates()
    {
        return $this->morphedByMany(AutomationTemplate::class, 'taggable');
    }
}