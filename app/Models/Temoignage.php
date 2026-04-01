<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temoignage extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'job',
        'company',
        'facebook',
        'twitter',
        'linkedin',
        'instagram',
        'tiktok',
        'youtube',
        'website',


        'content',

        'image',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
    
}
