<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Commentaire extends Resource
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
            'commentaires' => $this->commentaires,
            'note' => $this->note,
            'id_restaurants' => $this->id_restaurants,
            'id_users' => $this->id_users,
        ];
    }
}