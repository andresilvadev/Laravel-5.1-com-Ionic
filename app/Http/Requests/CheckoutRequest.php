<?php

namespace CodeDelivery\Http\Requests;

use CodeDelivery\Http\Requests\Request;

class CheckoutRequest extends Request
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
            'cupom_code' => 'exists:cupoms,code,used,0' // consulta na tabela de cupons se o cupom code existe com o
                                                        // campo code e se o campo used é igual a 0, se for igual a 1
                                                        // não posso usar.
        ];
    }
}
