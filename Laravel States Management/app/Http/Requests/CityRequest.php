<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\City;

class CityRequest extends FormRequest
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
            'citizens' => 'required|numeric',    
            'states' => 'required',
        ];
    }
    public function messages()
    {
        return [            
            'name.max' => 'O nome deve conter no máximo cem caracteres !',
            'name.string' => 'O nome só pode conter letras !',
            'citizens.numeric' => 'O número de habitantes deve conter apenas dígitos !',
            'states.required' => 'Por favor selecione um estado !',
        ];
    }
}
