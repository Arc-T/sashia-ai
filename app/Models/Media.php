<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $fillable = [
        'file_name',
        'file_path',
        'file_url',
        'mime_type',
        'file_size',
        'metadata',
        'resource_type',
        'resource_id',
        'resource_entity',
        'sort_order',
    ];

    protected $casts = [
        'metadata' => 'array',
        'file_size' => 'integer',
    ];

    public function resource()
    {
        return $this->morphTo('resource', 'resource_entity', 'resource_id');
    }
}