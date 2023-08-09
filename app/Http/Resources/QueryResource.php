<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class QueryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'full_name' => $this->full_name,
            'contact' =>  $this->contact,
            'email' =>  $this->email,
            'message' => $this->message
        ];
    }
}
