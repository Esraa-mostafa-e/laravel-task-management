<?php

namespace App\Http\Requests\Project;

use Illuminate\Foundation\Http\FormRequest;

class projectRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'       => ['required'],
            'department' => ['required'],
            'start_date' =>['required','date'],
            'end_date'   =>['required','date'],
            'status'     =>['required']

        ];
    }
}
