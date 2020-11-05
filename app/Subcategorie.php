<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategorie extends Model
{
    protected $fillable = [
        'name'
    ];

    public function scopeSearch($query, $search){

        return $query->select("id", "name")
        ->where('name', 'LIKE', "%$search%")
        ->get();

    }
}
