<?php

namespace App\Http\Requests;

class EmployeeRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
         $id = $this->employee ? ',' . $this->employee->id : '';

        return $rules = [
            'emp_code' => 'bail|required|max:15',
            'empname' => 'bail|required|max:50|unique:employees,empname' . $id,
        ];
    }
}
