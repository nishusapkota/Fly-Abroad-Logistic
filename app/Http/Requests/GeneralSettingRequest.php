<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class GeneralSettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
        'about_descs' => 'nullable|max:600',
        'login_image' => 'nullable|image|mimes:png,jpg,jpeg',
        'terms_and_condition' => 'nullable|max:1000',
        'privacy_policy' => 'nullable|max:1000'
        ];
    }

    function failedValidation(Validator $validator)
    { 
        throw new HttpResponseException(response()->json([
            'status' => false,
            'message' => 'Validation error',
            'data' => $validator->errors()
        ]));       
    }
}
