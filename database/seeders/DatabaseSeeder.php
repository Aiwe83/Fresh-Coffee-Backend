<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    
     //Los Seeders se utilizan para inicializar la base de datos con datos de prueba que permiten 
     //comprobar la aplicación sin la necesidad de introducir manualmente grandes cantidades de información.
    public function run()
    {
        $this->call(CategoriaSeeder::class);
        $this->call(ProductoSeeder::class);

    }
}