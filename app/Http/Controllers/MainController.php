<?php

namespace App\Http\Controllers;

use App\User;
use App\Venta;
use App\Product;
use App\Categoria;
use App\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','rol.admin']);
    }
    public function index(Request $request)
    {
      
        $productos=Product::all()->count();
     $usuarios=User::all()->count();
      $categorias =Categoria::all()->count();
     $productimages=ProductImage::all()->count();
     $ventas=Venta::all()->count();
     
         return view('dashboard.main.dashboard',['productos'=>$productos,'categorias'=>$categorias, 'imagenes'=> $productimages,'usuarios'=>$usuarios,'ventas'=>$ventas]);
    }
}
