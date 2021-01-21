<?php

namespace App\Http\Controllers;

use App\Product;
use App\Categoria;
use App\Subcategoria;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request;

class LandingPageController extends Controller
{
    public function index(Product $products, Request $request)
    {
       // $product=Product::with('subcategorias')->where('estado','=','concesionado')->get();
       //$productss=$products->subcategorias()->pluck('id');
        
        $subcategorias = Subcategoria::pluck('id','nombre');
        
        $productos=DB::table('products')->where('estado','=','concesionado')->orwhere('estado','=','aprobado')->paginate(10);
      $categorias =DB::table('categorias')->get();
     $productimages=DB::table('product_images')->get();
    
         return view('dashboard.vista_general.accesorios',
         ['productos'=>$productos,
         'categorias'=>$categorias, 
         'imagenes'=> $productimages,
         'subcategorias'=>$subcategorias]);
    }

    public function indexPersonalizado(Request $request, Categoria $categoria){
        $categorias =DB::table('categorias')->get();
        $productimages=DB::table('product_images')->get();
      
           $productos=Product::where([
               ['category_id','=',$categoria->id],
               ['estado', '=', 'aprobado'],
           ])->orWhere([
               ['category_id','=',$categoria->id],
               ['estado', '=', 'concesionado'],
           ])->paginate(10);
           
           $cantidad=$productos->count();
            return view('dashboard.vista_general.accesorios',['productos'=>$productos,'categorias'=>$categorias,'imagenes'=> $productimages]);
    }
}
