<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' =>
                'É obrigatório preencher o campo nome',
            'email.required' =>
                'É obrigatório preencher o campo email',
            'email.email' =>
                'Digite um email válido',
            'message.required' =>
                'É obrigatório preencher o campo menssagem'
        ];
    }
}
