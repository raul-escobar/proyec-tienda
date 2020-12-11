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
            'nombre'=>"cliente",
            'descripcion'=>"Rol por defecto",
           
        ]);
        Rol::create([
           'nombre'=>"encargado",
           'descripcion'=>"Rol con privilegios y acceso casi ilimitado",
          
       ]);
      
    Rol::create([
        'nombre'=>"supervisor",
        'descripcion'=>"Rol maximo y acceso total",
       
    ]);
    Rol::create([
        'nombre'=>"contador",
        'descripcion'=>"Intermediario en las compras y ventas de productos",
       
    ]);
    }
}
