<?php

namespace App\Http\Requests;

class EmployeeTaskRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
         $id = $this->employee_tasks ? ',' . $this->employee_tasks->id : '';

        return $rules = [
            
        ];
    }
}
