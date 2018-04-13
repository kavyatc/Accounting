<?php

namespace App\Http\Requests;

class BankRequest extends Request
{    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {   
        
        $id = $this->bank ? ',' . $this->bank->id : '';
       
        return $rules = [
            'bank_name' => 'bail|unique:banks,bank_name' . $id,            
        ];
    }
}
