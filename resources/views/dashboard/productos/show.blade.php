@extends('dashboard.master')   
@section('content')

<div class="card">
    <div class="card-header card-header-warning">
      <h4 class="card-title">
       Registro: {{$producto->nombre}}
      </h4>
      <div class="card-category">
       Visualizacion a detalle</div>
    </div>
   
    <div class="card-body">
    
    
<div class="form-group">
    <label for="nombre" class="bmd-label-floating">Producto</label>
<input type="text" readonly name="nombre" class="form-control" id="nombre" value="{{$producto->nombre}}">
    @error('nombre')

    <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    <label for="precio" class="bmd-label-floating">Precio</label>
    <input type="text" name="precio"readonly class="form-control" id="precio" value="{{$producto->precio}}">

</div>

<div class="form-group">
    <label for="detalle" class="bmd-label-floating">Detalle</label>
    <input type="text" name="detalle"readonly class="form-control" id="detalle" value="{{$producto->detalle}}">

</div>


<div class="form-group">
    <label for="foto" class="bmd-label-floating">Categoria</label>
    <input type="text" name="foto"readonly class="form-control" id="foto" value="@if($producto->category!=null){{$producto->category->nombre}}@endif">

</div>



    </div>
</div>

           
             
         
      

@endsection


