<?php

namespace App\Http\Requests\timesheet;

use Illuminate\Validation\Rule;
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
            'hours'        =>['required','time'],
            'user_id'      =>['required',Rule::exists('users','id')],
            'project_id'   => ['required',Rule::exists('projects','id')],
        ];
    }
}
