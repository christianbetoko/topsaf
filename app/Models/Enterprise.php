<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enterprise extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'about',
        'slogan',
        'description',
        'historique',
        'mission',
        'vision',
        'logo',
        'logo_sans_fond',
        'logo2',
    ];
}
