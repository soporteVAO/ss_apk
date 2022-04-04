<?php

namespace App\Http\Requests\Empresas;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmpresaRequest extends FormRequest
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
            'nombre'=>[
                'required', 'unique:empresas'
            ],
            'cuenta_id'=>[
                'required','unique:empresas'
            ],
            'api_key'=>[
                'required', 'unique:empresas'
            ]

        ];
    }

    public function messages(){
        return[
            'nombre.required' => 'El campo nombre es obligatorio',
            'nombre.unique' => 'Ya existe una empresa con este nombre',
            'cuenta_id.required' => 'El Id de la Cuenta de SharpSpring es obligatorio',
            'api_key.required' => 'La clave secreta de SharpSpring es obligatoria'
        ];
    }
}
