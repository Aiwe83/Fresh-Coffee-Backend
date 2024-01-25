<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistroRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


//Controlador Registro
class AuthController extends Controller
{
    //Hacemos los llamados a los Requests
    public function register(RegistroRequest $request)
    {
        //Validar el registro
        $data = $request->validated();

        //Crear el usuario
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),//bcrypt nos permite cachear el password

        ]);

        /*  Laravel Sanctum es un paquete de Laravel que proporciona un sistema de autenticación ligero
           para aplicaciones de página única (SPAs), aplicaciones móviles y APIs simples basadas en tokens.
           Permite autenticar y administrar el acceso de los usuarios a las APIs de su aplicación */

        //Retornar una respuesta(creamos un token y retornamos un token plano) 

        return [
            'token' => $user->createToken('PersonalToken')->plainTextToken,
            'user' => $user
        ];
    }

    //Controlador Login
    public function login(LoginRequest $request)
    {
        $data = $request->validated();

        //return "Desde aqui login"; /* Comprobamos en la consola network y luego response */


        //Revisar el password
        if (!Auth()->attempt($data)) {  
            return response([
                'errors' => ['El email o el password son incorrectos'],
                // 422 significa contenido improcesable(422 (Unprocessable Content) y es importante colocar para que el
                // codigo de rerror caiga en el catch de Login.jsx
            ], 422);
        }

        //Autenticar usuario
        //Cada vez que iniciamos sesion nos va a generar una token distinto

        $user = Auth::user();

        return [
            'token' => $user->createToken('PersonalToken')->plainTextToken,
            'user' => $user
        ];
    }

    //Controlador Logout
    public function logout(Request $request)
    {
        $user = $request->user();

        //Borramos el Token para que no se nos acumulen
        $user->currentAccessToken()->delete(); 

        return [
            'user' => null
        ];
        //Debug que lo miramos en la consola network response para ver si nos retorna una respuesta
        //return "Logout...";
    }
}