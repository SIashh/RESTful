<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Post extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nom' => $this->nom,
            'domaine' => $this->domaine,
            'niveauetude' => $this->niveauetude,
            'datedebut' => $this->datedebut,
            'duree' => $this->duree,
            'lien' => $this->lien
        ];
    }
}
