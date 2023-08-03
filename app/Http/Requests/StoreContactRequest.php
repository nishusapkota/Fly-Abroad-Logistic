<?php

namespace App\Http\Requests;

use App\Rules\UniqueEmailRule;
use Illuminate\Foundation\Http\FormRequest;

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
        $contactId= $this->route('contact');
        return [
            'phone' => 'required|array',
            'phone.*' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'email' => 'required|array',
            'email.*' => 'email|unique:contacts,email,'.$contactId,
            'location' =>'required',
            'link' => 'required'
        ];
    }
}