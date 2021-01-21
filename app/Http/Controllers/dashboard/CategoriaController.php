<?php

namespace App\Http\Controllers\dashboard;

use App\Categoria;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoria;

class CategoriaController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','rol.admin']);
    }
    public function index()
    {
        $categorias=Categoria::orderBy('id','desc')->paginate(6);
      $lista=$categorias->all();
         return view('dashboard.categorias.index',['categorias'=>$categorias,"lista"=>$lista]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        

         return view("dashboard.categorias.create",['categoria'=>new Categoria()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoria $request)
    {
        
      Categoria::create($request->validated());

      
      return back()->with('status','Categoria  Registrada!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $cat)
    {
        
        return view ('dashboard.categorias.show',["categoria"=>$cat]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoria $cat)
    {
      
        return view('dashboard.categorias.edit',["categoria"=>$cat]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCategoria $request, Categoria $cat)
    {
        $cat->update($request->validated());
        return back()->with('status','Categoria Actualizada!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoria $cat)
    {
        $cat->delete();
        return back()->with('status','Categoria Eliminada!');
    }
}
