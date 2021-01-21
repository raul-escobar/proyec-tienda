@extends('dashboard.master')   
@section('content')


<div class="card">
    <div class="card-header card-header-warning">
      <h4 class="card-title">
        Usuario: {{$user->name}}
      </h4>
      <div class="card-category">
      Revisando a detalle</div>
    </div>
   
    <div class="card-body"> 
    
       
            <div class="form-group">
                <label for="title">Usuario</label>
            <input type="text" readonly name="title" class="form-control" id="title" value="{{$user->name}}">
                @error('title')
    
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="url_clean">Rol</label>
                <input type="text" name="url_clean"readonly class="form-control" id="url_clean" value="{{$user->rol->nombre}}">
          
            </div>
            <div class="form-group">
              <label for="url_clean">Fecha de alta</label>
              <input type="text" name="url_clean"readonly class="form-control" id="url_clean" value="{{$user->created_at}}">
        
          </div>
          <div class="form-group">
            <label for="url_clean">Transacciones realizadas</label>
            <input type="text" name="url_clean"readonly class="form-control" id="url_clean" value="{{$ventas}}">
      
        </div>
        <div class="form-group">
          <label for="url_clean">Productos creados</label>
          <input type="text" name="url_clean"readonly class="form-control" id="url_clean" value="{{$total}}">
    
      </div>
             
    </div>
</div>     
      

@endsection


