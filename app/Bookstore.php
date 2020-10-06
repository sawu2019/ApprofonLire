<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookstore extends Model
{
    protected $fillable = [
        'nom',
        'complement',
        'adresse',
        'ville',
        'latitude',
        'longitude',
        'coordinates',
        'code_insee',
        'adresse_complet',
        'siret',
        'mail',
        'telephone',
        'site',
        'nom_city_ver'
    ];
}
