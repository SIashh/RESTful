<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $table = 'posts'; //le framework considère que la table correspond au nom de la classe au pluriel
	//LieuD = nom table
    protected $fillable = ["commentaire", "note"];
    static $rules = [
    	'commentaire' => 'required',
    	'note' => 'required',
    ];
}
