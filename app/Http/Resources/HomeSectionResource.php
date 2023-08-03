<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HomeSectionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return[
            'image' => $this->image,
            'sub_heading' => $this->sub_heading,
            'heading' => $this->heading,
            'order' => $this->order,
            'visibility' => $this->visibility,

        ];
    }
}
