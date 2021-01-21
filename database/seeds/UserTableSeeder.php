<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::create([
            'name'=>"Cliente",
            'email'=>"cliente@gmail.com",
           'rol_id'=>'1',
           'password'=>'12345'
        ]);
        User::create([
            'name'=>"Encargado",
            'email'=>"encargado@gmail.com",
           'rol_id'=>'2',
           'password'=>'12345'
        ]);
        User::create([
            'name'=>"Supervisor",
            'email'=>"supervisor@gmail.com",
           'rol_id'=>'3',
           'password'=>'12345'
        ]);
        User::create([
            'name'=>"Contador",
            'email'=>"contador@gmail.com",
           'rol_id'=>'4',
           'password'=>'12345'
        ]);

    }
}
