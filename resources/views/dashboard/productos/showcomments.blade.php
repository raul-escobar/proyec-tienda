@extends('dashboard.master')   
@section('content')

<div class="card">
    <div class="card-header card-header-warning">
      <h4 class="card-title">
       Registro: {{$product->nombre}}
      </h4>
      <div class="card-category">
       Comentarios totales:{{$total}}</div>
    </div>
   
    <div class="card-body">
    
    
@foreach ($comentarios as $comentario)
<div class="form-group">
    <label for="nombre" class="bmd-label-floating">Usuario:  {{ $comentador->find($comentario->user_id)->name }}</label>
<label for="" class="form-control">Comentario     :{{$comentario->message}}</label>
@if ($comentario->response!=null)
<label for="nombre" class="bmd-label-floating">Respuesta: </label>
<label for="" class="form-control">{{$comentario->response}}</label>
@endif


<form action="{{route('respondercoment')}}" method="POST">
    
    @csrf
<div class="row">
    
    <div class="col-2">
        <button type="submit" class="btn btn-success ">Responder</button>
    </div>
   <div class="col-9">
       <input  type="text" name="respuesta" class="form-control bmd-label-floating">
   </div>
  <input type="hidden" name="id_comentario" value="{{$comentario->id}}">
</div>
</form>
</div>
@endforeach
        
       

    </div>
</div>

           
             
         
      

@endsection


