<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $guarded = [];

    public function peoples()
    {
        return $this->hasMany('App\People');
    }
}
