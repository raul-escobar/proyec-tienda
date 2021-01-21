<?php

namespace App\Http\Controllers\dashboard;

use App\User;
use App\Venta;
use App\Comment;
use App\Product;
use App\Categoria;
use App\ProductImage;
use App\Subcategoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreProduct;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $listCategorias=Categoria::pluck('id','nombre');
   
        if(auth()->user()->rol_id==1)
        {
            $productos=Product::with('categoria')->where('user_id','=',auth()->user()->id)->orderBy('id','desc');
        }
        else
        {
            $productos=Product::with('categoria')->orderBy('id','desc');
        }
        
        if($request->has('search')){
            $productos=$productos
            ->where('nombre','like','%'.request('search').'%');
            //->orWhere('category_id','like','%'.request('search').'%');
    
        }
        if($request->has('categorysearch')){
            $productos=$productos
           
            ->where('category_id','like','%'.request('categorysearch').'%');
    
        }
       $productos=$productos->paginate(6);
        $cantidad=$productos->total();
        
         return view('dashboard.productos.index',['productos'=>$productos,'cantidad'=>$cantidad,'listCategorias'=>$listCategorias]);
    }
    public function index2(Request $request)
    {
      
   
     
            $productos=Product::with('categoria')->where('estado','=','aprobado')->orderBy('id','desc');
        
            $productos=Product::with('categoria')->orderBy('id','desc');
        
        
        if($request->has('search')){
            $productos=$productos
            ->where('nombre','like','%'.request('search').'%');
            //->orWhere('category_id','like','%'.request('search').'%');
    
        }
        if($request->has('categorysearch')){
            $productos=$productos
           
            ->where('category_id','like','%'.request('categorysearch').'%');
    
        }
       $productos=$productos->paginate(6);
        $cantidad=$productos->total();
        $categorias =DB::table('categorias')->get();
        $productimages=DB::table('product_images')->get();
         return view('dashboard.vista_general.accesorios',['productos'=>$productos,'cantidad'=>$cantidad,'categorias'=>$categorias,'imagenes'=>$productimages]);
    }
   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $listCategorias=Categoria::pluck('id','nombre');
       $listSubcategorias=Subcategoria::pluck('id','nombre');
        $listUsers=User::pluck('id','name');

         return view("dashboard.productos.create",['producto'=>new Product(),'listCategorias'=>$listCategorias,'listUsers'=>$listUsers,'listSubcategorias'=>$listSubcategorias]);
    }
    public function ventas()
     {
        $productos = Product::all();
        $comprador = User::all();
            $ventas=Venta::paginate(10);
            
            return view("dashboard.productos.indexcontador",compact('ventas','productos','comprador'));
     }

    public function rechazado(Request $request)
    {
       
        DB::table('products')
              ->where('id', $request->id)
              ->update(['comentario' => $request->comentario]);
              return back();
    }

    public function cambiarestado(Venta $estad)
    {
      
      if($estad->estado=="pendiente")
      {
        DB::table('ventas')
        ->where('id', $estad->id)
        ->update(['estado' => "entregado"]);
        DB::table('users')->where('id','=',$estad->vendedor_id)->increment('cash',$estad->total);

      }
      else if($estad->estado=="entregado"){
        DB::table('ventas')
        ->where('id', $estad->id)
        ->update(['estado' => "pendiente"]);
        DB::table('users')->where('id','=',$estad->vendedor_id)->decrement('cash',$estad->total);
      }
      
       return response()->json($estad->estado);
    }


    public function estadoProducto(Product $estado){
       
        if($estado->estado=="null"){
            $estado->estado="aprobado";
            $estado->comentario="";
            
        }
        else if($estado->estado=="aprobado"){
            $estado->estado="rechazado";
          
        }
        else if($estado->estado=="rechazado"){
            $estado->estado="concesionado";
            $estado->comentario="";
        }
        else if($estado->estado=="concesionado"){
            $estado->estado="aprobado";
            $estado->comentario="";
        }
        $estado->save();
       
return response()->json($estado->estado);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProduct $request)
    {
     
      $product= Product::create($request->validated());
      $product->subcategorias()->sync($request->subcategory_id);
      
      return back()->with('status','Producto Guardado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $producto)
    {
        return view ('dashboard.productos.show',["producto"=>$producto]);
    }
    public function comments(Product $product)
    {
        $comentarios=Comment::where('product_id',$product->id)->get();
        $total=$comentarios->count();
        $comentador = User::all();
        return view ('dashboard.productos.showcomments',['total'=>$total,"product"=>$product,'comentarios'=>$comentarios,'comentador'=>$comentador]);
    }

    public function pagados()
    {
        $users=User::where('cash','!=','0')->orderBy('id','desc')->paginate(8);
       $total=$users->count();
        return view('dashboard.user.indexcash',['users'=>$users,'total'=>$total]);
    }
    public function historialcomprados()
    {
        $productos=Product::all();
        $usuarios=User::all();
        $comprados=Venta::where('comprador_id',auth()->user()->id)->get();
        $total=$comprados->count();
        return view ('dashboard.transacciones.index',['total'=>$total,"comprados"=>$comprados,'productos'=>$productos,'usuarios'=>$usuarios]);

    }
    public function respondercoment(Request $request)
    {
        DB::table('comments')
        ->where('id', $request->id_comentario)
        ->update(['response' => $request->respuesta]);
        return back();
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $producto)
    {
        //dd(old('subcategory_id'));
        $listSubcategorias=Subcategoria::pluck('id','nombre');

        $listCategorias=Categoria::pluck('id','nombre');
       

        return view('dashboard.productos.edit',["producto"=>$producto,'listCategorias'=>$listCategorias,'listSubcategorias'=>$listSubcategorias]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProduct $request, Product $producto)
    {
       
        $producto->subcategorias()->sync($request->subcategory_id);
        $producto->update($request->validated());
        return back()->with('status','Producto Actualizado!');
    }

 

    public function image(Request $request, Product $producto)
    {
       
       $request->validate([
        'image' => 'required|mimes:jpeg,bmp,png|max:10240'
       ]);
       $filename= time().".".$request->image->extension();
       $request->image->move(public_path('images'),$filename);

       ProductImage::create(['image'=>$filename, 'product_id'=>$producto->id]);
       return back()->with('status','Imagen cargada con exito!');
    }

    public function imageDownload(ProductImage $image){
       
        $pathImage=public_path('images/').$image->image;
        return response()->download($pathImage);
    }
    public function imagedelete(ProductImage $image){
       $image->delete();
        $pathImage=public_path('images/').$image->image;
        unlink($pathImage);
        return back()->with('status','imagen '.$image->id.' eliminada');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $producto)
    {
        $producto->delete();
        return back()->with('status','Producto Eliminado!');
    }
}
