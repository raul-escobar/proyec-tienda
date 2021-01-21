@extends('dashboard.master')   
@section('content')
<div class="table-responsive">
  <div class="card">
  <div class="card-header card-header-warning">
    <h4 class="card-title">
      Usuarios
    </h4>
    <div class="card-category">
      Aqui encontraras todos los usuarios que pueden ingresar al sistema</div>
  </div>
  <div class="ml-1 form-inline table-responsive">
    <a class="btn btn-success btn-sm mt-1 mb-3 ml-3 btn-round" href="{{route('user.create')}}"> <i class="fa fa-plus"></i>_Crear</a><div class="btn-sm mt-3 mb-3 ml-3">{{$users->links()}}</div>
    
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
            <td>
                Acciones
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
            
          <td>
               
            <a href="{{route('user.show',$user->id)}}" class="btn btn-warning btn-round"> <i class="material-icons">help</i> </a>
            @if (auth()->user()->rol_id==2 && $user->rol->nombre=='supervisor')
                
            @else
            <a href="{{route('user.edit',$user->id)}}" class="btn btn-info btn-round"> <i class="material-icons">create</i> </a>

            @endif
             
                  
                  <button class="btn btn-danger btn-round" type="submit" data-toggle="modal" data-target="#deleteModal" data-id="{{ $user->id}}"><i class="material-icons">delete</i> </button>
             


          </td>
        </tr>
        @endforeach
    </tbody>
</table>  
      

  </div>
  </div>
</div>



<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalLabel">Borrar Usuario</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <p>Seguro que desea borrar el Usuario? </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <form id="formDelete" method="POST" action="{{route('user.destroy',0)}}" data-action="{{route('user.destroy',0)}}">
            @method('DELETE')
        
            @csrf
            <button type="submit" class="btn btn-primary">Confirmar</button>
        </div>
        </form>
          
      </div>
    </div>
  </div>
  <script>
//$('#title').on('show.bs.modal', function (event) {
   //var extraction = $(event.relatedTarget) 
  // var title=extraction.data('title')
//}

      window.onload=function(){
      $('#deleteModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('id') // Extract info from data-* attributes
  
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  action = $('#formDelete').attr('data-action').slice(0,-1)
  action+=id
  console.log(action)
  $('#formDelete').attr('action',action)
  var modal = $(this)
  modal.find('.modal-title').text('Vas a borrar el Usuario: ' + id)

})
}

  </script>



@endsection