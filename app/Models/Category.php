<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // app/Models/Category.php
    protected $fillable = [
        'name',
        'slug',
        'description',
        'color_hex',
        'parent_id',
        'sort_order',
        'is_active'
    ];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function promptTemplates()
    {
        return $this->hasMany(PromptTemplate::class);
    }

    public function automationTemplates()
    {
        return $this->hasMany(AutomationTemplate::class);
    }

    public function submissions()
    {
        return $this->hasMany(Submission::class);
    }
}
