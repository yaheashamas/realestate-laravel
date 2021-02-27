<?php

namespace App\Http\Resources\Registres;

use Illuminate\Http\Resources\Json\JsonResource;

class RegistriesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
