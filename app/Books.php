<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    protected $fillable = [
        'name', 'surname', 'email', 'book_name','tel_raqam'
    ];
}
