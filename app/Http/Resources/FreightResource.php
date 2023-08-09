<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FreightResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'freight_name' => $this->freight_name,
            'dim_factor' => $this->dim_factor,
            'weight_wise_rate' => $this->weight_wise_rate,
            'dimension_wise_rate' => $this->dimension_wise_rate
        ];
    }
}
