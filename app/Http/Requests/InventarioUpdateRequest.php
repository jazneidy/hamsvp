<?php

namespace Deposito\Http\Requests;

use Deposito\Http\Requests\Request;

class InventarioUpdateRequest extends Request
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
            
             'cantidad'=> 'required|number_format(integer)'
            'valorUnitario'=>'required|number_format(integer)',
            'valorTotal'=> 'required| number_format(integer)',

        ];
    }
}
