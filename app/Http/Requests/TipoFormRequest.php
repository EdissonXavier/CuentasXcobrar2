<?php

namespace cuentasCobrar\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TipoFormRequest extends FormRequest
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
        'idtipopago'=>'required|max:8',
        'nombretipopago'=>'required|max:100',
        'referencias'=>'required|max:100',
        'descripcion'=>'max:200',
        'estado'=>'1',
        ];
    }
}
