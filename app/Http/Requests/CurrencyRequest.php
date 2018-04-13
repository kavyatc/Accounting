<?php

namespace App\Http\Requests;

class CurrencyRequest extends Request
{    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {   
        
        $id = $this->currency ? ',' . $this->currency->id : '';
       
        return $rules = [
            'currency_code' => 'bail|unique:currencies,currency_code' . $id,
            'currency_name' => 'bail|unique:currencies,currency_name' . $id,            
        ];
    }
}
