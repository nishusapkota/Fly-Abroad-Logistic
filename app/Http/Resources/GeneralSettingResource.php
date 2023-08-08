<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GeneralSettingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'about_descs' => $this->about_descs ?? null,
            'login_image' => $this->login_image ? asset($this->login_image) : null,
            'terms_and_condition' =>  $this->terms_and_condition ?? null,
            'privacy_policy' =>  $this->privacy_policy ?? null
        ];
    }
}
