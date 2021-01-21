
@extends('dashboard.partials.menu1')
@section('content')




<div class = "container">
<h1 align="center" > ▁ ▂ ▄ ▅ ▆ ▇ █ Tienda Online █ ▇ ▆ ▅ ▄ ▂ ▁  </h1>


</div>
<div class="container">

  <div class="row">

    <div class="col-lg-3">

      <h1 class="my-4">Todas las categorias</h1>
      <div class="list-group">
        <a href="{{route('home')}}" class="list-group-item">Todos los productos</a>
          @foreach ($categorias as $item)
          
      <a href="{{route('indexPersonalizado',$item->id)}}" class="list-group-item">{{$item->nombre}}</a>
          @endforeach
       
      </div>

    </div>
    <!-- /.col-lg-3 -->

    <div class="col-lg-9">

      <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <div class="carousel-item active">
            <img class="d-block img-fluid" src="{{asset('images/portada1.png')}}" >
          </div>
          <div class="carousel-item">
            <img class="d-block img-fluid" src="{{asset('images/portada2.png')}}" >
          </div>
          <div class="carousel-item">
            <img class="d-block img-fluid" src="{{asset('images/portada3.png')}}" >
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

      <div class="row">

        @foreach ($productos as $item)
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card h-100">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                {{$count=0}}
                @foreach ($imagenes as $image)
            @if ($item->id==$image->product_id)
            
            
            
            
              <div class="carousel-item {{$count==0?'active' : ''}}">
              <img class="d-block w-100 img-thumbnail img-fluid" src="{{asset('images/')}}/{{$image->image}} " alt="First slide">
              
            </div>
            {{$count++}}
          
            @endif
            @endforeach
              
              </div>
            
            </div>



         
            
           
            <div class="card-body">
              <h4 class="card-title">
              <a href="#">{{$item->nombre}}</a>
              </h4>
              <h5>{{$item->precio}} $us</h5>
            <p class="card-text">{{$item->detalle}}</p>
            <label for="">Stock: {{$item->cantidad}}</label>
            </div>
            @auth
            <div class="row">
              <div class="ml-3 col-4">
                <a href="" class="btn-block  btn btn-dark btn-sm mt-2 btn-round" data-toggle="modal" data-target="#ModalComentario-{{$item->id}}"><i class="fa fa-comment"></i></a>
          
              </div>
          <div class="col-2"></div>
          @if ($item->cantidad==0)
          <div class="col-4">
                
            <button  class="btn-block  btn btn-info btn-sm mt-2 " id="{{ $item->id }}" data-toggle="modal" data-target="#staticBackdrop"><i class="fa fa-shopping-cart"></i></button>
          
          </div>
          @else
          <div class="col-4">
                
            <button  class="btn-block  btn btn-info btn-sm mt-2 " id="mymodal-{{ $item->id }}" data-toggle="modal" data-target="#ModalVenta-{{$item->id}}"><i class="fa fa-shopping-cart"></i></button>
          
          </div>
          @endif
              
             
            </div> 
            @endauth
            @guest
            <div class="col">
                
              <a href="/login" class="btn-block  btn btn-info btn-sm mt-2 " >Iniciar Sesion para comprar</a>
           
            </div>
            @endguest
            
            <div class="card-footer">
              <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
            </div>
          </div>
         
          @auth
          <!-- Modal Comentario -->
          <div class="modal fade" id="ModalComentario-{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Envie comentarios y sugerencias</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              <form action="{{route('comment')}}" method="POST" >
               
                @csrf
                <div class="modal-body">
                  <textarea name="message" id="comentario" rows="10" class="form-control"></textarea>
                </div>
                <div class="modal-footer">
                  <input type="hidden" value="{{$item->id}}" name="idproducto">
                  <input type="hidden" value="{{auth()->user()->id}}" name="idcliente">

                  <button type="submit" class="btn btn-sm btn-outline-success">Enviar Comentarios</button>
                
                  <button type="button" class="btn btn-sm btn-outline-secondary " data-dismiss="modal">Cerrar</button>
                </div>
              </form>
               
              </div>
            </div>
          </div>
          @endauth
           <!-- Modal Venta-->
           <div class="modal fade" id="ModalVenta-{{$item->id}}" >
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Comprando Producto</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="{{route('comprar')}}" method="post">
                    @csrf
                    Detalle del producto <br>
                    <label >Producto:{{$item->nombre}}</label><input type="hidden" for="" name="nombre" Value="{{$item->nombre}}"> <br>
                    <label >Precio:{{$item->precio}}</label><input type="hidden" for="" name="precio" Value="{{$item->precio}}"> <br>
                    <label >Detalle:{{$item->detalle}}</label><input type="hidden" for="" name="detalle" Value="{{$item->detalle}}"> <br>
                    <label >Stock Disponible:{{$item->cantidad}}</label><input type="hidden" for=""  Value="{{$item->cantidad}}"> <br>

           <input type="hidden" value="{{$item->id}}" name="id">
           <input type="hidden" value="{{$item->user_id}}" name="user">
                 
                 
                  
                </div>
                <div class="modal-footer">
                 
                  <button type="submit" class="btn btn-sm btn-outline-success" >Confirmar Compra</button>
                  <button type="button" class="btn btn-sm btn-outline-danger " data-dismiss="modal">Cancelar</button>
                </div>
              </form>
              </div>
            </div>
          </div>



        </div>
        @endforeach
      <!-- Modal -->



      </div>
      {{$productos->links()}}
      <!-- /.row -->

    </div>
    <!-- /.col-lg-9 -->

  </div>
  <!-- /.row -->

</div>

<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Alerta!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        El producto que intentas comprar se encuentra fuera de stock
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Entendido</button>
      </div>
    </div>
  </div>
</div>


@endsection