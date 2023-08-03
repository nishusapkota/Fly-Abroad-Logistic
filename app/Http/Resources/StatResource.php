<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StatResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'shipment_completed' => $this->shipment_completed,
            'destination' => $this->destination,
            'local_partner' => $this->local_partner,
            'year_of_experience' => $this->year_of_experience
        ];
    }
}
