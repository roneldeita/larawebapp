<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostsCreateRequest extends FormRequest
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
            
            'category_id'   =>'required',
            'title'         =>'required|min:3|max:100',
            'body'          =>'required|min:3|max:1000',
            'photo_id'      =>'mimes:jpeg,bmp,png'
        ];
    }
}
