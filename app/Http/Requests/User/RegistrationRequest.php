<?php

namespace App\Http\Requests\User;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required'],
            'last_name' => ['required'],
            'date_of_birth'=>['required','date'],
            'gender'=>['required',Rule::in('female','male')],
            'email' => ['required','email',Rule::unique('users','email')],
            'password' => ['required'],
            'confirm_password' => ['required','same:password'],
        ];
    }
}
