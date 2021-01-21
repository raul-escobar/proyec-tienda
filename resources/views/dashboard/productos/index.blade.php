@extends('dashboard.master')   
@section('content')



<div class="table-responsive">
  <div class="card ">
  <div class="card-header card-header-warning">
    <h4 class="card-title">
      Tienes el rol de {{auth()->user()->rol->nombre}}

    </h4>
    <div class="card-category">
      Listado de los productos</div>
  </div>
  <div class="ml-1 form-inline ">
    
    <a class="btn btn-success btn-sm mt-1 mb-3 ml-3  btn-round" href="{{route('producto.create')}}"><i class="fa fa-plus"></i> Registrar</a>

   
    
    <div class="btn-sm mt-3 mb-3 ml-3">{{$productos->appends(['search'=>request('search')])->links()}}</div>
    <form action="{{route('producto.index')}}" method="" class="form-inline">
      <label for="" class="nav-link">Buscar por categoria</label>
      <div class="form-group dropdown mr-2">
       
  <select name="categorysearch" class="form-control selectpicker" id="categorysearch"  data-live-search="true" >
    <option selected class="dropdown-item text-white"  value="">Seleccione</option>
    @foreach ($listCategorias  as $nombre=>$id)
    <option class="dropdown-item" aria-labelledby="dropdownMenuButton" value="{{$id}}">{{$nombre}}</option>
    
        @endforeach
  
   

  </select>
    </div>
    <input type="text" class="form-control" name="search" placeholder="Buscar por Nombre" value="{{request('search')}}">
      <button type="submit" class="ml-2 btn btn-success btn-round btn-sm" >Buscar</button>
      </form>
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
          CANTIDAD
      </td>
     
           <td>
           ESTADO

           </td>
       
        
        
      
    <td>
      FECHA REGISTRO
  </td>
  <td>
    USUARIO
</td>
          
            <td>
                ACCIONES
            </td>
        </tr>
    </thead>
    <tbody>

      <tr>
        @foreach ($productos as $producto)
        <tr>
           
            <td>
                {{$producto->nombre}}
            </td>
           
            
            <td>
              {{$producto->precio}}
          </td>
          <td>
        
            {{$producto->category_id}}
           
            
        </td>
        <td>
        
          {{$producto->cantidad}}
         
          
      </td>
          @if (auth()->user()->rol_id==2)
           <td>
            
                 
            
           <a href="" data-id="{{$producto->id}}" class="approved btn btn-{{$producto->estado=='pendiente'? "warning": "info"}} btn-sm  btn-round" data-toggle="modal" data-target="#confirmarestado">{{$producto->estado}}</a>

           </td>
           @else 
           <td>
            <label  class="btn btn-{{$producto->estado=='pendiente'? "danger": "success"}} btn-sm  btn-round" >{{$producto->estado}}</label>
           </td>
        

       @endif
      
       <div class="modal fade" id="confirmasrestado-{{$producto->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Porque fue rechazado?</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="{{route('comentrechazado')}}" method="post">
                @csrf
              <textarea name="comentario" id="" class="form-control"></textarea>
              <input type="hidden" value="{{$producto->id}}" name="id">
            </div>
            <div class="modal-footer">
              
            <button  type="submit" class=" btn btn-success" >Enviar Comentario</button>
          </form>
            </div>
          </div>
        </div>
      </div>
      
    <td>
      {{$producto->created_at->format('d-M-Y')}}
  </td>
  <td>
        
    {{$producto->user->name}}
   
    
</td>   
@if ($producto->estado=="aprobado" ||$producto->estado=="concesionado")
<td>
  <a href="{{route('producto.show',$producto->id)}}" class="btn btn-primary btn-sm  btn-round"><i class="material-icons">visibility</i></a>
  <a href="{{route('producto.comments',$producto->id)}}" class="btn btn-warning btn-sm  btn-round"><i class="material-icons">question_answer</i></a>

</td>

@else
<td>
  <a href="{{route('producto.show',$producto->id)}}" class="btn btn-primary btn-sm  btn-round"><i class="material-icons">visibility</i></a>
 
  <a href="{{route('producto.edit',$producto->id)}}" class="btn btn-info btn-sm  btn-round"><i class="material-icons">create</i></a>
 
      
      <button class="btn btn-danger btn-sm  btn-round" type="submit" data-toggle="modal" data-target="#deleteModal" data-id="{{ $producto->id}}"><i class="material-icons">delete</i></button>
 


</td>
@endif 
            
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



document.querySelectorAll(".approved").
forEach(link=>link.addEventListener("click", function(){

var id=link.getAttribute("data-id");
$.ajax({
  method: "POST",
  url: "{{URL::to("/")}}/dashboard/producto/estado/"+id,
  data:{'_token': '{{csrf_token()}}'}
})
  .done(function( approved ) {
   if(approved=="null"){
     $(link).removeClass('btn-success');
     $(link).removeClass('btn-danger');
     $(link).addClass('btn-warning');
     $( link).text("Pendiente")
   }
   else if(approved=="rechazado"){
     $(link).removeClass('btn-success');
     $(link).addClass('btn-danger');
     $( link).text("Rechazado")
     $("#confirmasrestado-"+id).modal("show");
   }
   else if(approved=="aprobado"){
    $(link).removeClass('btn-warning');
     $(link).addClass('btn-info');
     $( link).text("Aprobado")
   }
   else if(approved=="concesionado"){
    $(link).removeClass('btn-danger').removeClass('btn-info');
     $(link).addClass('btn-success');
     $( link).text("Concesionado")
   }
  });
}))



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