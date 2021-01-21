<?php

use App\Subcategoria;
use Illuminate\Database\Seeder;

class SubcategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subcategoria::truncate();
        Subcategoria::create([
            'nombre'=>"Nuevas",
            'detalle'=>"Estado a estrenar",
           
        ]);
        Subcategoria::create([
           'nombre'=>"Seminuevas",
           'detalle'=>"Con poco tiempo de uso",
          
       ]);
      
       Subcategoria::create([
        'nombre'=>"Originales",
        'detalle'=>"De marca prestigiosa",
       
    ]);
    Subcategoria::create([
        'nombre'=>"Imitacion",
        'detalle'=>"Imitaciones",
       
    ]);
    Subcategoria::create([
        'nombre'=>"Para hombre",
        'detalle'=>"Solo para varones",
       
    ]);
    Subcategoria::create([
        'nombre'=>"Para mujer",
        'detalle'=>"Solo damas",
       
    ]);
    Subcategoria::create([
        'nombre'=>"Unisex",
        'detalle'=>"Para ambos sexos",
       
    ]);
  
    Subcategoria::create([
        'nombre'=>"Para ninos",
        'detalle'=>"Solo para ninos",
       
    ]);
    
    }
}
