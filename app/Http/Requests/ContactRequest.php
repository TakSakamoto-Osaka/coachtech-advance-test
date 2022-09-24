<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'lastname'  => 'required|string',
            'firstname' => 'required|string',
            'gender'    => 'required|numeric|between:1,2',
            'email'     => 'required|email|max:255',
            'postcode'  => 'required|string|min:8|max:8',
            'address'   => 'required|string',
            'building'  => 'string',
            'opinion'   => 'string'
        ];
    }
}
