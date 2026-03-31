<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InscriptionFormation extends Model
{
    use HasFactory;
    protected $fillable = [
        'prenom',
        'nom',
        'postnom',
        'sexe',
        'date_naissance',
        'email',
        'telephone',
        'adresse',
        'formation_id',
    ];
    public function formation()
    {
        return $this->belongsTo(Formation::class);
    }
}
