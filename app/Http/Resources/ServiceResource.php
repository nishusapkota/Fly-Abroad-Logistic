<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    { 
        return [
            'heading' => $this->heading,
            'short_description' => $this->short_description,
            'long_description'=> $this->long_description,
            'image' => asset($this->image),
            'visibility' => $this->visibility
        ];
    }
}
