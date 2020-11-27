@extends('dashboard.master')   
@section('content')


    
<div class="card">
    <div class="card-header card-header-warning">
      <h4 class="card-title">
        Categoria: {{$categoria->nombre}}
      </h4>
      <div class="card-category">
       Visualizacion a detalle</div>
    </div>
   
    <div class="card-body">
       
            <div class="form-group">
                <label for="nombre" class="bmd-label-floating">Nombre</label>
            <input type="text" readonly name="nombre" class="form-control" id="nombre" value="{{$categoria->nombre}}">
                @error('title')
    
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="detalle" class="bmd-label-floating">Detalle</label>
                <input type="text" name="detalle"readonly class="form-control" id="detalle" value="{{$categoria->detalle}}">
          
            </div>
    </div>
</div>


           
           
             
         
      

@endsection


