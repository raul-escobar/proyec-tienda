<?php

namespace App\Http\Controllers\dashboard;

use App\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class TransaccionesController extends Controller
{
    public function comprar(Request $request)
    {
     
     //DB::table('comments')->insert(
     // ['titulo'=> 'comentario','message' => $request->message, 'product_id' => $request->idproducto, 'user_id'=>$request->idcliente]
  //);
 
      Venta::create(['product_id'=> $request->id
      ,'comprador_id' => auth()->user()->id, 'total'=>$request->precio ,'vendedor_id'=>$request->user]);
      DB::table('products')->where('id','=',$request->id)->decrement('cantidad');

      return back()->with('status','Venta  Registrada!');

      
    }
}
