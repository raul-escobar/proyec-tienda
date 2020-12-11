<?php

namespace App\Http\Controllers;

use App\Product;
use App\Categoria;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request;

class LandingPageController extends Controller
{
    public function index(Request $request)
    {
        $productos=DB::table('products')->paginate(10);
      $categorias =DB::table('categorias')->get();
     $productimages=DB::table('product_images')->get();
      $puestos=collect(['First slide','Second slide','Thrid slide']);
         return view('welcome',['productos'=>$productos,'categorias'=>$categorias, 'puestos'=>$puestos,'imagenes'=> $productimages]);
    }

    public function indexPersonalizado(Request $request, Categoria $categoria){
        $categorias =DB::table('categorias')->get();
     $productimages=DB::table('product_images')->get();
        $productos=Product::where('category_id','=',$categoria->id)->paginate(10);
        return view('welcome',['productos'=>$productos,'categorias'=>$categorias,'imagenes'=> $productimages]);
    }
}
