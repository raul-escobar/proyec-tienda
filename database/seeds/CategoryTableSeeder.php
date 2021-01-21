<?php

use App\Categoria;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::truncate();
        Categoria::create([
            'nombre'=>"Zapatillas",
            'detalle'=>"Para hombre y mujer",
           
        ]);
        Categoria::create([
           'nombre'=>"Sandalias",
           'detalle'=>"Solo para damas",
          
       ]);
      
       Categoria::create([
        'nombre'=>"Zapatos",
        'detalle'=>"Para hombre y mujer",
       
    ]);
    Categoria::create([
        'nombre'=>"Tacones",
        'detalle'=>"Solo para damas",
       
    ]);
    Categoria::create([
        'nombre'=>"Mocasines",
        'detalle'=>"Solo para varones",
       
    ]);
    }
}
