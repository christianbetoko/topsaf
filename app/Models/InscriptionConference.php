<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InscriptionConference extends Model
{
    use HasFactory;
    protected $fillable = [
        'prenom',
        'nom',
        'postnom',
        'sexe',
        'email',
        'telephone',
        'adresse',
        'code_parrain',
        'conference_id'
    ];
    
     public function conference()
    {
        return $this->belongsTo(Conference::class);
    }


}
