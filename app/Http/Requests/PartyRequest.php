<?php

namespace App\Http\Requests;

class PartyRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
         $id = $this->party ? ',' . $this->party->id : '';

        return $rules = [             
            'party_name' => 'bail|unique:parties,party_name' . $id,  
        ];
    }
}

