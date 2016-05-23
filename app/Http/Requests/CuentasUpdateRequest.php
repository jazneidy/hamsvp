<?php

namespace Deposito\Http\Requests;

use Deposito\Http\Requests\Request;

class CuentasUpdateRequest extends Request
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
             'codigo'=>'required|unique:clasesPUC',
            'nombreCuenta'=>'required',
        ];
    }

    public function messages() {
        return [
            'required' => 'El campo '.':attribute' . ' es requerido.'
        ];
    }
}
