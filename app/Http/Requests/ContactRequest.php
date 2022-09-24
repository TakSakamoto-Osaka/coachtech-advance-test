<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ZipCodeRule;

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
            'lastname'  => 'required',
            'firstname' => 'required',
            'gender'    => 'required|numeric|between:1,2',
            'email'     => 'required|email|max:255',
            'postcode'  => ['required', new ZipCodeRule()],
            'address'   => 'required',
            'opinion'   => 'required|max:120'
        ];
    }
    
    /**
     * messages
     *
     * @return void
     */
    public function messages()
    {
        return [
            'lastname.required'  => '※必須項目です',
            'firstname.required' => '※必須項目です',

            'gender.required'    => '※必須項目です',
            'gender.numeric'     => '男性又は女性を選択して下さい',
            'gender.between'     => '男性又は女性を選択して下さい',

            'email.required'     => '※必須項目です',
            'email.email'        => 'メールアドレス形式で入力して下さい',
            'email.max'          => '255文字を超えています',

            'postcode.required'  => '※必須項目です',

            'address.required'   => '※必須項目です',
            'opinion.required'   => '※必須項目です',
            'opinion.max'        => '120文字を超えています',
        ];
    }
}
