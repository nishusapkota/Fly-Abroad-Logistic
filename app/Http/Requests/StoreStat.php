<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStat extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules()
    {
        return [
            'shipment_completed' => 'required|numeric',
            'destination' => 'required|numeric',
            'local_partner' => 'required|numeric',
            'year_of_experience' => 'required|numeric'
        ];
    }
}
