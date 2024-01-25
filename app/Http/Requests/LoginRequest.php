<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize() 
    {
        return true;//Lo cambiamos a true sino no nos dira que no se puede acceder a ese request
    }
 
    public function rules() 
    {
        return [
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'El email es obligatorio',
            'email.email' => 'Email no es valido',
            'email.exists' => 'Esta cuenta no existe',
            'password' => 'El password es obligatorio'
        ];
    }
}