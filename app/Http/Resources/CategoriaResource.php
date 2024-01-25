<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoriaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    //Devuelve los datos que se quieren mostrar los demas se ocultan
    //Aqui se colocan las columnas que vamos a retornar y que llaves vamos a tener osea 
    //tenemos control total de las respuestas JSON
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'icono' => $this->icono

        ];
    }
}
