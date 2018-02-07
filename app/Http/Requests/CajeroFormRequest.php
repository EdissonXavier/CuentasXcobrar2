<?php

namespace cuentasCobrar\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CajeroFormRequest extends FormRequest
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
        'nombrecajero'=>'required|max:200|alpha',
        'fechanacimiento'=>'required',
        'ciudadnacimiento'=>'required|max:100',
        'direccion'=>'required|max:200',
        'telefono'=>'required|max:15',
        'email'=>'required|max:100',
        'estado'=>'1',
        ];
    }
}
