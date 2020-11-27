@extends('dashboard.master')   
@section('content')

@include('dashboard.partials.validation-error')
<div class="card">
  <div class="card-header card-header-warning">
    <h4 class="card-title">
      Registro: {{$producto->nombre}}
    </h4>
    <div class="card-category">
    Editando su informacion</div>
  </div>
 
  <div class="card-body"> 
<form action="{{route("producto.update",$producto->id)}}" method="POST">
  @method('PUT')
 @include('dashboard.productos._form')      
</form>
  </div>
</div>
@endsection
