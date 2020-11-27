<?php

namespace App\Http\Controllers\dashboard;

use App\User;
use App\Product;
use App\Categoria;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProduct;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
     
        $productos=Product::orderBy('id','desc')->paginate(8);
        $cantidad=$productos->total();
        
         return view('dashboard.productos.index',['productos'=>$productos,'cantidad'=>$cantidad]);
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
