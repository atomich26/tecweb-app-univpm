<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Config;
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
            'username'=>'required|unique:utenti,username,'.$this->route('utenteID').'|max:' . Config::get('strings.utente.username'),
            'password'=>'required|confirmed|max:30|min:7',
            'nome'=>'required|string|max:' . Config::get('strings.utente.nome'),
            'cognome'=>'required|string|max:' . Config::get('strings.utente.cognome'),
            'file_img'=>'mimes:jpeg,png,jpg|max:4092|nullable',
            'data_nascita'=>'required|date|before:today',
            'email'=>'required|unique:utenti,email,'.$this->route('utenteID').'|email|max:' . Config::get('strings.global.default'),
            'telefono'=>'required|unique:utenti,telefono,'.$this->route('utenteID').'|digits:' . Config::get('strings.global.telefono'),
        ];
    }
}
