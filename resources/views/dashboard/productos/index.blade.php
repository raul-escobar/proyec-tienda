@extends('dashboard.master')   
@section('content')



<div class="table-responsive">
  <div class="card ">
  <div class="card-header card-header-warning">
    <h4 class="card-title">
      Registros

globales({{$cantidad}})

    </h4>
    <div class="card-category">
      Aqui encontraras todos los registros</div>
  </div>
  <div class="ml-1 form-inline table-responsive">
    <a class="btn btn-success btn-sm mt-1 mb-3 ml-3  btn-round" href="{{route('producto.create')}}"><i class="fa fa-plus"></i> Registrar</a><div class="btn-sm mt-3 mb-3 ml-3">{{$productos->links()}}</div>
    
  </div>
  <div class="card-body table-responsive">
    <table class="table table-shopping">


    <thead>
        <tr style="color:#FF7126 ">
           
            <td style="color:#FF7126 ">
                PRODUCTO
            </td>
            
            
            <td>
              PRECIO
          </td>
          <td>
            CATEGORIA
        </td>
         
      
       
        
        
      
    <td>
      FECHA REGISTRO
  </td>
          
            <td>
                ACCIONES
            </td>
        </tr>
    </thead>
    <tbody>

        @foreach ($productos as $producto)
        <tr>
           
            <td>
                {{$producto->nombre}}
            </td>
           
            
            <td>
              {{$producto->precio}}
          </td>
          <td>
            @if ($producto->categoria!=null)
            {{$producto->categoria->nombre}}
            @endif
            
        </td>
        
      
       
      
    <td>
      {{$producto->created_at->format('d-M-Y')}}
  </td>
            
            <td>
                <a href="{{route('producto.show',$producto->id)}}" class="btn btn-primary btn-sm  btn-round"><i class="material-icons">visibility</i></a>
               
                <a href="{{route('producto.edit',$producto->id)}}" class="btn btn-info btn-sm  btn-round"><i class="material-icons">create</i></a>
               
                    
                    <button class="btn btn-danger btn-sm  btn-round" type="submit" data-toggle="modal" data-target="#deleteModal" data-id="{{ $producto->id}}"><i class="material-icons">delete</i></button>
               


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
          <h5 class="modal-title" id="modalLabel">Borrar Registro</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <p>Seguro que desea borrar el registro ?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <form id="formDelete" method="POST" action="{{route('producto.destroy',0)}}" data-action="{{route('producto.destroy',0)}}">
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
  var nom=button.data('nombre')
  
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  action = $('#formDelete').attr('data-action').slice(0,-1)
  action+=id
  console.log(action)
  $('#formDelete').attr('action',action)
  var modal = $(this)
  modal.find('.modal-title').text('Vas a borrar al producto: ' + id)

})
}

  </script>



@endsection