<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidat extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom', 'prenom', 'date_naissance', 'adresse', 'tel', 'email', 'nationalite', 'sexe', 'lieu_naissance'
    ];

    public function cursus(){
        return $this->belongsTo(Cursus::class);
    }

    public function diplome(){
        return $this->hasMany(Diplome::class);
    }
    public function bulletin(){
        return $this->hasMany(Bulletin::class);
    }

    public function inscription(){
        return $this->hasOne(Inscription::class);
    }
}
