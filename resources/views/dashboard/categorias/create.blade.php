@extends('dashboard.master')   
@section('content')

@include('dashboard.partials.validation-error')
<div class="card">
    <div class="card-header card-header-warning">
      <h4 class="card-title">
        Categoria Nueva
      </h4>
      <div class="card-category">
      Cree su nueva categoria</div>
    </div>
   
    <div class="card-body">
<form action="{{route("cat.store")}}" method="POST">
   

 @include('dashboard.categorias._form')      
</form>
    </div>
</div>

@endsection


