<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ContactResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'phone' => json_decode($this->phone),
            'email' => json_decode($this->email),
            'location' => $this->location,
            'link' => $this->link
        ];
    }
}
