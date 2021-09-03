<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'nome'=>'required|max:50',
            'modello'=>'required|unique:prodotti,modello,'.$this->productID.'|max:20',
            'descrizione'=>'required|max:400',
            'specifiche'=>'required|max:1000',
            'guida_installazione'=>'required|max:1000',
            'note_uso'=>'required|max:1000',
            'file_img'=>'image|max:2048|nullable',
        ];
    }
}
