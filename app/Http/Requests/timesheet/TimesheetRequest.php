<?php

namespace App\Http\Requests\timesheet;

use Illuminate\Foundation\Http\FormRequest;

class TimesheetRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'task_name'    => ['required'],
            'date'         => ['required','date'],
            'hours'        =>['required','integer'],
            'user_id'      =>['required','exists:projects,id'],
            'project_id'   => ['required','exists:users,id'],
        ];
    }
}
