<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use \Illuminate\Validation\Rules\Password;

class UserFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'username' => [
                'required',
                'alpha_dash:ascii',
                'min:3',
                'max:20',
            ],
            'email' => [
                'required',
                'string',
                'email',
            ],
            'password' => [
                'required',
                'confirmed',
                'string',
                Password::min(8)
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised(),
            ]
        ];

    }

    public function messages()
    {
        return [
            'username.required' => "É obrigatório informar um nome de usuário.",
            'username.min' => "O nome de usuário precisa ter no mínimo 3 caracteres."
        ];
    }

}
