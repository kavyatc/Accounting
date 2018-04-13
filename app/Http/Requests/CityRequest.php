<?php

namespace App\Http\Requests;

class CityRequest extends Request
{    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {       
        $id = $this->city ? ',' . $this->city->id : '';
             
        return $rules = [
            'city_code' => 'bail|unique:cities,city_code' . $id,                      
        ];
    }
}
