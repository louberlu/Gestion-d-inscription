<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cursus extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_cursus', 'description_cursus'
    ];
}
