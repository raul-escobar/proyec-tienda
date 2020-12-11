<?php

namespace App\Http\Controllers\dashboard;

use App\User;
use App\Product;
use App\Categoria;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProduct;
use App\Http\Controllers\Controller;
use App\ProductImage;

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
       $productos=$productos->paginate(8);
        $cantidad=$productos->total();
        
         return view('dashboard.productos.index',['productos'=>$productos,'cantidad'=>$cantidad,'listCategorias'=>$listCategorias]);
    }

   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listCategorias=Categoria::pluck('id','nombre');
       
        $listUsers=User::pluck('id','name');

         return view("dashboard.productos.create",['producto'=>new Product(),'listCategorias'=>$listCategorias,'listUsers'=>$listUsers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProduct $request)
    {
        
      Product::create($request->validated());

      
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $producto)
    {
        
        $listCategorias=Categoria::pluck('id','nombre');
       

        return view('dashboard.productos.edit',["producto"=>$producto,'listCategorias'=>$listCategorias]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProduct $request, Product $product)
    {
        
        $product->update($request->validated());
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
