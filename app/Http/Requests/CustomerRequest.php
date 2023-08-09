<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class CustomerRequest extends FormRequest
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
            'sender_name' => 'required',
        'sender_contact' => 'required|regex:/^98[0-9]*$/|numeric|digits:10',
        'sender_country' => 'required',
        'sender_state' => 'required',
        'sender_city' => 'required',
        'sender_zip' => 'required',
        'sender_address' => 'required',

        'receiver_name' => 'required|',
        'receiver_contact' => 'required|regex:/^98[0-9]*$/|numeric|digits:10',
        'receiver_country' => 'required',
        'receiver_state' => 'required',
        'receiver_city' => 'required',
        'receiver_zip' => 'required',
        'receiver_address' => 'required',
        ];
    }

    public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
            'status' => false,
            'message' => 'validation errors',
            'data' => $validator->errors()
        ]));
    }
}
