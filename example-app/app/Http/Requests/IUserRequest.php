<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IUserRequest extends FormRequest
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
            'name' => 'string|max:254',
            'email' => ['string', 'email', 'max:255', 'unique:users'],
            'image_provile' => 'mimes:jpeg,png,jpg,gif,svg|max:240128',
            'password' => ['string', 'min:8', 'confirmed'],
        ];
    }
}
