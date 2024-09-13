<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class UserRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name'      => ['required'],
            'last_name'       => ['required'],
            'date_of_birth'   =>['required','date'],
            'gender'          =>['required',Rule::in('female','male')],
            'email'           => ['required','email',Rule::unique('users','email')->ignore($this->user)],
            'password'        => ['required'],
        ];
    }
}
