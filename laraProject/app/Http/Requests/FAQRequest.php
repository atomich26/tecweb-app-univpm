<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Config;
use Illuminate\Foundation\Http\FormRequest;

class FAQRequest extends FormRequest
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

            'domanda'=>'required|string|min:20|max:'. Config::get('strings.faq.domanda'),
            'risposta'=>'required|string|min:20|max:' . Config::get('strings.faq.risposta'),
        ];
    }
}
