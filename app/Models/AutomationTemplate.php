<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AutomationTemplate extends Model
{
    use HasFactory;

    protected $table = 'automation_templates';

    protected $fillable = [
        'title',
        'description',
        'automation_id',
        'category_id', // Now references automation_categories
        'user_id',
    ];

    public function automation()
    {
        return $this->belongsTo(Automation::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class); // Updated relationship
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->morphToMany(PromptTag::class, 'taggable');
    }

    public function submissions()
    {
        return $this->morphMany(Submission::class, 'submissible');
    }
}