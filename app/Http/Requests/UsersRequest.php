<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
            'name'      =>'required|alpha_num|min:3|max:32',
            'email'     =>'required|email|unique:users',
            'role_id'   =>'required',
            'password'  =>'required|min:3|confirmed',
            'password_confirmation' =>'required|min:3',
            'file'      =>'mimes:jpeg,bmp,png'
        ];
    }
}
