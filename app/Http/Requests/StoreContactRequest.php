<?php

namespace App\Http\Requests;

use App\Models\Contact;
use App\Rules\UniqueJsonFieldRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreContactRequest extends FormRequest
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
             'phone' => 'required|array',
             'phone.*' => [
                 'regex:/^98[0-9]*$/',
                 'min:10',
                'distinct'
             ],
             'email' => 'required|array',
             'email.*' => [
                 'email',
                 'distinct'
             ],
             'location' => 'required',
             'link' => 'required'
         ];
     }
     
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'Validation errors',
            'data'      => $validator->errors()
        ]));
    }
}
