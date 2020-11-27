@extends('dashboard.master')   
@section('content')

@include('dashboard.partials.validation-error')
<div class="card">
  <div class="card-header card-header-warning">
    <h4 class="card-title">
      Categoria: {{$categoria->nombre}}
    </h4>
    <div class="card-category">
      Edite la categoria</div>
  </div>
 
  <div class="card-body">
<form action="{{route("cat.update",$categoria->id)}}" method="POST">
  @method('PUT')
 @include('dashboard.categorias._form')      
</form>
  </div>
</div>

@endsection
