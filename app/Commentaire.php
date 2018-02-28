<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    protected $table = 'commentaires'; //le framework considère que la table correspond au nom de la classe au pluriel
	//LieuD = nom table
    protected $fillable = ["commentaires", "note","id_users"];
    static $rules = [
    	'commentaires' => 'required',
    	'note' => 'required',
    	'id_users' => 'required',
    ];
}
