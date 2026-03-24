<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'image',
        'is_active',
        'subtitle',
        'location',
        'instructor',
        'duration',
        'price',
        'code',
        'slug',
        'video_url',
        'start_date',
        'end_date'
    ];

}
