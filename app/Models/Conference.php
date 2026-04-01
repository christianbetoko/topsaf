<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conference extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'image',
        'is_active',
        
        'location',
        
        
        'price',
        
        'slug',
        'video_url',
        '_date',
       
    ];
    protected $casts = [
        '_date' => 'date',
        'is_active' => 'boolean',
    ];
     public function inscriptions()
    {
        return $this->hasMany(InscriptionConference::class);
    }


    
}
