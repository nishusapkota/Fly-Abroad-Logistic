<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShippingPartnerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return[
            'shipping_partner' => $this->shipping_partner,
            'shipping_tracking_id'  => $this->shipping_tracking_id,
            'tracking_url'  => $this->tracking_url
        ];
    }
}
