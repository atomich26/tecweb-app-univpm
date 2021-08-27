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
            'username'=>'required|unique:users,username|max:25',
            'password'=>'required|password|max:50',
            'nome'=>'required|string|max:50',
            'cognome'=>'required|string|max:50',
            'dataNascita'=>'required|date|before:today',
            'email'=>'required|unique:users,email|email|max:200',
            'telefono'=>'required|unique:users,telefono|digits:10',

        ];
    }
}
