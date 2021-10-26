<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Config;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Resources\CentroAssistenza;

class CentroRequest extends FormRequest
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

            'ragione_sociale'=>'required|unique:centri_assistenza,ragione_sociale,'.$this->route('centroID').'|max:' . Config::get('strings.centro_assistenza.ragione_sociale'),
            'telefono'=>'required|unique:centri_assistenza,telefono,'.$this->route('centroID').'|digits|max:' . Config::get('strings.global.telefono'),
            'email'=>'required|unique:centri_assistenza,email,'.$this->route('centroID').'|email|max:' . Config::get('strings.global.default'),
            'sito_web'=>'required|max:50|unique:centri_assistenza,sito_web,'.$this->route('centroID').'|nullable|max:' . Config::get('strings.centro_assistenza.sito_web'),
            'descrizione'=>'max:' . Config::get('strings.centro_assistenza.descrizione'),
            'via'=>'required|string|max:' . Config::get('strings.centro_assistenza.via'),
            'città'=>'required|alpha|max:' . Config::get('strings.centro_assistenza.città'),
            'cap'=>'required|digits:' . Config::get('strings.centro_assistenza.cap'),
        ];
    }
}
