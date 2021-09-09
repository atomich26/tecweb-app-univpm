<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Resources\CentroAssistenza;

class CenterRequest extends FormRequest
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
            
            'ragione_sociale'=>'required|unique:centri_assistenza,ragione_sociale,'.$this->centerID.'|max:50',
            'telefono'=>'required|unique:centri_assistenza,telefono,'.$this->centerID.'|digits:10',
            'email'=>'required|unique:centri_assistenza,email,'.$this->centerID.'|email',
            'sito_web'=>'max:50|unique:centri_assistenza,sito_web,'.$this->centerID.'|nullable',
            'descrizione'=>'max:900',
            'via'=>'required|string|max:50',
            'città'=>'required|string|max:50',
            'cap'=>'required|digits:5',
        ];
    }
}
