<?php

namespace App\Http\Controllers;

use App\User;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class AjaxControler extends Controller
{
    public function verificarCorreo(Request $request)
    {
       if  ($request->get('email'))
       {
          
           $email=$request->get('email');
           $correo=User::all()->where('email','=',$email);
           $data=DB::table("users")
           ->where('email',$email)
           ->count();
          
           if($data)
           {
            echo 'not_unique';
           }
           else
           {
            echo 'unique';
           }
       }
    }
    public function updateUsuario(Request $request, $id)
    {

        $valores = $request->all();
        $registro = Usuario::find($id);
        if(is_null($registro))  response()->json( ["error"=>"Registro no encontrado"] ,404);
        $registro->fill($valores);
        $registro->save();
        return response()->json($registro->toArray(),200);
    }
    public function storeCategoria(Request $request)
    {
        $valores = $request->all();
        $registro = new Categoria();
        $registro->fill($valores);
        $registro->save();
        return response()->json($registro->toArray(),200);
    }
    public function destroyCategoria($id)
    {
        try {
            $registro = Categoria::find($id);
            if(is_null($registro))  response()->json( ["error"=>"Registro no encontrado"] ,404);
            $a= $registro->toArray();
            $registro->delete();
            return response()->json($registro->toArray(),200);
        }catch (\Illuminate\Database\QueryException $e) {
            return response()->json( ["error" => $e->getMessage() ] ,500);
        }
    }
}
