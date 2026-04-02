<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'description',
        'video_url',
        'images',
        'is_active',
    ];
    protected $casts = [
        'images' => 'array',
        'is_active' => 'boolean',
    ];
}
