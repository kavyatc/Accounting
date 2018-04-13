<?php

namespace App\Http\Requests;

class CashBookRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
         $id = $this->cash_book ? ',' . $this->cash_book->id : '';

        return $rules = [             
            
        ];
    }
}

