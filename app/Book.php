<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guarded = [];

    public function people()
    {
        return $this->belongsTo('App\People');
    }

    public function commandeur ()
    {
        return $this->morphTo('App\Commande', 'commandes')->latest();
    }
}
