<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
            'inpnameutLogin' =>'min:3|max:60',
           'inputPassword' =>'min:7|max:100',
        ];
    }
    public function attributes()
    {
        return[
            'inputPassword' => 'пароль'
        ];
    }

    public function messages()
    {
        return[
            'inputPassword.min' => 'Пароль должен содержать как минимум 7 символа',
            'inputLogin.min' => 'Логин должен содержать как минимум 3 символа',
            'inputPassword.max' => 'Пароль должен содержать как максимум 100 символа',
            'inputLogin.max' => 'Логин должен содержать как максимум 60 символа'
        ];
    }
}
