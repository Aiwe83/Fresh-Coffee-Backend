<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoriaCollection;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        /*  return response()->json([
            'categorias' => Categoria::all()
        ]); */

        //Hace lo mismo que la funcion de arriba rertornanado una respuesta tipo json. En vez de categorias dira data
        return new CategoriaCollection(Categoria::all());
    }
}