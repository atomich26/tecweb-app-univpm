<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class userRequest extends FormRequest
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
            'username'=>'required|unique:utenti,username|max:25',
            'password'=>'required|confirmed|max:50',
            'nome'=>'required|string|max:50',
            'cognome'=>'required|string|max:50',
            'file_img'=>'mimes:jpeg,png,jpg,svg|max:4092',
            'data_nascita'=>'required|date|before:today',
            'email'=>'required|unique:utenti,email|email|max:200',
            'telefono'=>'required|unique:utenti,telefono|digits:10',

        ];
    }
}
