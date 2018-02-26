<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ["nom", "domaine", "niveauetude", "datedebut", "duree", "lien"];
    static $rules = [
    	'nom' => 'required',
    	'domaine' => 'required',
    	'niveauetude' => 'required',
    	'datedebut' => 'required',
    	'duree' => 'required',
    	'lien' => 'required',
    ];
}
