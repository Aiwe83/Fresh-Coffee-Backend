<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password as PasswordRules; //Le cambiamos el nombre por PasswordRules

class RegistroRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => [
                'required',
                'confirmed',
                PasswordRules::min(8)->letters()->symbols()->numbers()
            ],

        ];
    }

    public function messages()
    {
        return [
            'name' => 'El nombre es requerido',
            'email.required' => 'El email es requerido',
            'email.email' => 'El email no es valido tiene que tener un formato de email',
            'email.unique' => 'El email ya existe',
            'password' => 'La contraseña debe tener al menos 8 caracteres, al menos una letra, al menos un numero y al menos un simbolo'
        ];
    }
}