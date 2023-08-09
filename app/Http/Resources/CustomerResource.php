<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
        'sender_name' => $this->sender_name,
        'sender_contact' => $this->sender_contact,
        'sender_country' => $this->sender_country,
        'sender_state' => $this->sender_state,
        'sender_city' => $this->sender_city,
        'sender_zip' => $this->sender_zip,
        'sender_address' => $this->sender_address,
        'receiver_name' => $this->receiver_name,
        'receiver_contact' => $this->receiver_contact,
        'receiver_country' => $this->receiver_country,
        'receiver_state' => $this->receiver_state,
        'receiver_city' => $this->receiver_city,
        'receiver_zip' => $this->receiver_zip,
        'receiver_address' => $this->receiver_address, 
        ];
    }
}
