<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Config;
use Illuminate\Foundation\Http\FormRequest;

class ProdottoRequest extends FormRequest
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
            'nome'=>'required|string|min:5|unique:prodotti,nome,' . $this->route('prodottoID') . '|max:'. Config::get('strings.prodotto.nome'),
            'modello'=>'required|alpha_num|unique:prodotti,modello,'. $this->route('prodottoID') . '|max:' . Config::get('strings.prodotto.modello'),
            'descrizione'=>'required|string|min:20|max:' . Config::get('strings.prodotto.descrizione'),
            'specifiche'=>'required|string|min:20|max:' . Config::get('strings.prodotto.specifiche'),
            'guida_installazione'=>'nullable|string|min:20|max:' . Config::get('strings.prodotto.guida_installazione'),
            'note_uso'=>'nullable|string|min:20|max:' . Config::get('strings.prodotto.note_uso'),
            'file_img'=>'mimes:jpeg,png,jpg|max:2048|nullable',
        ];
    }
}
