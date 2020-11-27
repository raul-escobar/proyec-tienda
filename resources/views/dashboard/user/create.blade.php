@extends('dashboard.master')   
@section('content')

@include('dashboard.partials.validation-error')
<div class="card">
    <div class="card-header card-header-warning">
      <h4 class="card-title">
       Usuario Nuevo
      </h4>
      <div class="card-category">
     Mucha atencion al rol que le asigna</div>
    </div>
   
    <div class="card-body">   
<form action="{{route("user.store")}}" method="POST">
   

 @include('dashboard.user._form')      
</form>
    </div>
</div>
@endsection


