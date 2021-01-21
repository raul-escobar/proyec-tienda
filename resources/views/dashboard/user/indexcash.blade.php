@extends('dashboard.master')   
@section('content')
<div class="table-responsive">
  <div class="card">
  <div class="card-header card-header-warning">
    <h4 class="card-title">
      Usuarios con pagos recibidos
    </h4>
    <div class="card-category">
      Total:{{$total}}</div>
  </div>
  <div class="ml-1 form-inline table-responsive">
    <div class="btn-sm mt-3 mb-3 ml-3">{{$users->links()}}</div>
    
  </div>
  <div class="card-body table-responsive">
    <table class="table table-shopping">

    <thead>
        <tr style="color:#FF7126 ">
            <td>
                Nombre
            </td>
           
            <td>
                Rol
            </td>
           
          <td>
            Correo
        </td>
        <td>
          Monto Acumulado
      </td>
           
        </tr>
    </thead>
    <tbody>

        @foreach ($users as $user)
        <tr>
            <td>
               {{$user->name}}
            </td>
           
           <td>
            {{ $user->rol->nombre}}
         </td>
            <td>
                {{$user->email}}
            </td>
            <td>
              {{$user->cash}} $us
          </td>
            
         
        </tr>
        @endforeach
    </tbody>
</table>  
      

  </div>
  </div>
</div>





@endsection