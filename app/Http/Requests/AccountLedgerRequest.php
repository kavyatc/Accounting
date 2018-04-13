<?php

namespace App\Http\Requests;

class AccountLedgerRequest extends Request
{    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {       
        $id = $this->account_ledger ? ',' . $this->account_ledger->id : '';
             
        return $rules = [
            'account_name' => 'bail|unique:account_ledgers,account_name' . $id,                      
        ];
    }
}
