@extends('dashboard.master')   
@section('content')

<div class="card">
    <div class="card-header card-header-warning">
      <h4 class="card-title">
       Registro de: {{$formulario->beneficiario}}
      </h4>
      <div class="card-category">
       Encontrado en el reporte personalizado</div>
    </div>
   
    <div class="card-body">
    
    
       
            <div class="form-group">
                <label for="title" class="bmd-label-floating">Beneficiario</label>
            <input type="text" readonly name="title" class="form-control" id="title" value="{{$formulario->beneficiario}}">
                @error('title')
    
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="color" class="bmd-label-floating">Cedula de Identidad</label>
                <input type="text" name="color"readonly class="form-control" id="color" value="{{$formulario->ci}}">
          
            </div>

            <div class="form-group">
                <label for="foto" class="bmd-label-floating">Telefono</label>
                <input type="text" name="foto"readonly class="form-control" id="foto" value="{{$formulario->telefono}}">
          
            </div>
            <div class="form-group">
                <label for="foto" class="bmd-label-floating">Barrio</label>
                <input type="text" name="foto"readonly class="form-control" id="foto" value="{{$formulario->barrio}}">
          
            </div>
           
            <div class="form-group">
                <label for="foto" class="bmd-label-floating">Distrito</label>
                <input type="text" name="foto"readonly class="form-control" id="foto" value=" @if($formulario->distrito!=null){{ $formulario->distrito->nombre }}@endif">
          
            </div>
            <div class="form-group">
                <label for="foto" class="bmd-label-floating">Usuario que lo registro</label>
                <input type="text" name="foto"readonly class="form-control" id="foto" value="@if($formulario->user!=null){{$formulario->user->name}} @endif">
          
            </div>
            <div class="form-group">
                <label for="foto" class="bmd-label-floating">Fecha de registro</label>
                <input type="text" name="foto"readonly class="form-control" id="foto" value="{{$formulario->created_at}}">
          
            </div>
           
           
    </div>
</div>       
         
      

@endsection


