<?php

use App\Rol;
use Illuminate\Database\Seeder;

class RolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rol::truncate();
        Rol::create([
            'nombre'=>"encargado",
            'descripcion'=>"PUESTO DE ENCARGADO",
           
        ]);
        Rol::create([
           'nombre'=>"cliente",
           'descripcion'=>"ACCESO BASICO",
          
       ]);
       Rol::create([
        'nombre'=>"contador",
        'descripcion'=>"ACCESO LIMITADO",
       
    ]);
    Rol::create([
        'nombre'=>"supervisor",
        'descripcion'=>"ACCESO DE ALTO NIVEL",
       
    ]);
    }
}
