<?php

namespace App\Http\Requests;

class TaskRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
         $id = $this->tasks ? ',' . $this->tasks->id : '';

        return $rules = [
            
        ];
    }
}
