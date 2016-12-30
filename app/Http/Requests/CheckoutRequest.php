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
    public function rules(\Illuminate\Http\Request $request)
    {
        $rules = ['cupom_code' => 'exists:cupoms,code,used,0'];

        $this->buildRulesItems(0, $rules);
        $items = $request->get('items');
        $items = !is_array($items)? [] : $items;

        foreach ($items as $key => $val){
            $this->buildRulesItems($key, $rules);
        }

        return $rules;

//        return [
//            'cupom_code' => 'exists:cupoms,code,used,0', // consulta na tabela de cupons se o cupom code existe com o
//                                                        // campo code e se o campo used é igual a 0, se for igual a 1
//                                                        // não posso usar.
//            'items.0.product_id' => 'required',
//            'items.0.qtd' => 'required'
//        ];
    }

    public function buildRulesItems($key, array &$rules)
    {
        $rules["items.$key.product_id"] = 'required';
        $rules["items.$key.qtd"] = 'required';
    }
}