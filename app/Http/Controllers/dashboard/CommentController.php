<?php

namespace App\Http\Controllers\dashboard;

use App\Comment;
use App\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreComment;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function index()
    {
        $categorias=Categoria::orderBy('id','desc')->paginate(10);
       
         return view('dashboard.categorias.index',['categorias'=>$categorias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function guardar(Request $request)
    {
     
     //DB::table('comments')->insert(
     // ['titulo'=> 'comentario','message' => $request->message, 'product_id' => $request->idproducto, 'user_id'=>$request->idcliente]
  //);
      Comment::create(['titulo'=> 'comentario','message' => $request->message, 'product_id' => $request->idproducto, 'user_id'=>$request->idcliente]);
      return back()->with('status','Comentario  Registrado!');

      
    }
}
