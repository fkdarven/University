<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StateRequest extends FormRequest
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
            'name' => 'required|max:100|string',
            'initials' => 'required|max:3|alpha',    
        ];
    }
    public function messages()
    {
        return [            
            'name.max' => 'O nome deve conter no máximo cem caracteres !',
            'name.alpha' => 'O nome só pode conter letras !',
            'initials.max' => 'A sigla deve conter no máximo três caracteres !',
            'initials.alpha' => 'O nome só pode conter letras !',
        ];
    }
}
