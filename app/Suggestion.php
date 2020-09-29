<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suggestion extends Model
{
    protected $fillable = [
        'nom',
        'int_link',
        'book_aut',
        'type',
        'user_mail'     
    ];
}
