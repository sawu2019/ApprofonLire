<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $guarded = [];

    public function people()
    {
        return $this->hasMany('App\People');
    }

    public function subcategories(){
        return $this->hasMany('App\Categorie', 'parent_id');
    }
}
