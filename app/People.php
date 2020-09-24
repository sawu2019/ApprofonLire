<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    protected $guarded = [];

    public function categories()
    {
        return $this->belongsTo('App\Categorie');
    }
}
