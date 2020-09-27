<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    protected $guarded = [];

    public function categorie()
    {
        return $this->belongsTo('App\Categorie');
    }

    public function book()
    {
        return $this->belongsTo('App\Book');
    }
}
