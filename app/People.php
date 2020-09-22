<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    protected $fillable = [
        'nom',
        'photo',
        'title',
        'ed_source',
        'int_link',
        'int_categ',
        'int_sub_categ',
        'int_share_text'
    ];
}
