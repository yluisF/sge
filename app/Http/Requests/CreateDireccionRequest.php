<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateDireccionRequest extends FormRequest
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
           'persona_id' => 'unique:direcciones',
           'direccion' => 'required',
            'no_int' => 'required',
           'no_ext' => 'required',
            'localidad' => 'required',
            'cp' =>'required',
            'latitud' => 'required',
            'longitud' => 'required',
            'colonia_id' =>'numeric|required|not_in:0',
            'municipio_id' =>'numeric|required|not_in:0',
        ];
    }

    public function messages()
    {
        return [
                       'direccion.required' => 'Introduce tu Dirección actual',
           'no_int.required' => 'Introduce tu Número Interior',
            'no_ext.required' => 'Introduce tu Número Exterior',
         'localidad.required' => 'Introduce tu Localidad',
         'cp.required' => 'Introduce el codigo postal',
            'colonia_id.required' => 'Se perdieron las Colonias espra a que agreguen al sistema',
        'municipio_id.required' => 'Se perdieron los municipios espra a que agreguen al sistema',
        'persona_id.unique' => 'Ya haz registrado tu direccion Actualizala cuando quieras ',

        ];
    }
}
