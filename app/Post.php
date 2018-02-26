<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ["commentaire", "note"];
    static $rules = [
    	'commentaire' => 'required',
    	'note' => 'required',
    ];
}
