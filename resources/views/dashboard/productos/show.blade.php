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
            <label for="foto" class="bmd-label-floating">Fecha de publicacion</label>
            <input type="text" name="foto"readonly class="form-control" id="foto" value="{{$producto->created_at}}">
        
        </div>
        @if ($producto->comentario !=null)
        <div class="form-group">
          <label for="foto" class="bmd-label-floating">Motivo de rechazo</label>
          <input type="text" name="foto"readonly class="form-control" id="foto" value="{{$producto->comentario}}">
        
        </div>
        @endif
        
        
        
        <a href="{{route('producto.index')}}" button type="submit" class="btn btn-primary mb-2">Regresar </a>
        
        
          

    </div>
</div>

           
             
         
      

@endsection


