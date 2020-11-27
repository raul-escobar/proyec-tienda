@extends('dashboard.master')   
@section('content')

@include('dashboard.partials.validation-error')
<div class="card">
    <div class="card-header card-header-warning">
      <h4 class="card-title">
        Registro nuevo
      </h4>
      <div class="card-category">
      Detalles del beneficiario</div>
    </div>
   
    <div class="card-body">
<form action="{{route("producto.store")}}" method="POST">
   

 @include('dashboard.productos._form')      
</form>
    </div>
</div>

@endsection


