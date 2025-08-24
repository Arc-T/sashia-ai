<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubmissionCategory extends Model
{
    use HasFactory;

    protected $table = 'submission_categories';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'parent_id',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function parent()
    {
        return $this->belongsTo(SubmissionCategory::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(SubmissionCategory::class, 'parent_id');
    }

    public function submissions()
    {
        return $this->hasMany(Submission::class);
    }
}