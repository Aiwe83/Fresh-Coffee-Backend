<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    public function user()
    {
        //1 Pedido pertece a 1 usuario 1:1
        return $this->belongsTo(User::class);
    }

    public function productos()
    {
        // 1 Pedido tiene muchos productos 1:N
        //withPivot('cantidad'); sirve para añadir la columna "cantidad" a la consulta pedido_productos
        return $this->belongsToMany(Producto::class, 'pedido_productos')->withPivot('cantidad');
    }


}