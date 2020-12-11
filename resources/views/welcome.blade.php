<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ShopStore</title>

        <!-- Fonts -->
    <link href="{{asset('css/shop-homepage.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <link href="{{asset('templatemain/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

        <!-- Styles -->
        
    </head>
    <style>
      #form {
  width: 250px;
  margin: 0 auto;
  height: 50px;
}

#form p {
  text-align: center;
}

#form label {
  font-size: 30px;
}

input[type="radio"] {
  display: none;
}

label {
  color: grey;
}

.clasificacion {
  direction: rtl;
  unicode-bidi: bidi-override;
}

label:hover,
label:hover ~ label {
  color: orange;
}

input[type="radio"]:checked ~ label {
  color: orange;
}
    </style>
    <body>
       <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Tienda de Zapatos</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Tienda
              <span class="sr-only">(current)</span>
            </a>
          </li>
@guest
<li class="nav-item">
    <a class="nav-link" href="{{route('login')}}">Iniciar Sesion</a>
  </li>
@endguest
          
          @auth
          <li class="nav-item">
          <label class="nav-link" href="">Bienvenido {{auth()->user()->name}}</label>
            </li>
          <li class="nav-item">
          <a class="nav-link" href="{{route('producto.index')}}">Ir al Panel</a>
          </li>
          @endauth
          
         
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
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
              </div>
              <div class="row">
                <div class="ml-3 col-4">
                  <a href="" class="btn-block  btn btn-dark btn-sm mt-2 btn-round" data-toggle="modal" data-target="#ModalComentario"><i class="fa fa-comment"></i></a>
            
                </div>
            <div class="col-2"></div>
                <div class="col-4">
                  
                  <button  class="btn-block  btn btn-info btn-sm mt-2 " data-toggle="modal" data-target="#ModalVenta"><i class="fa fa-shopping-cart"></i></button>
                </form>
                </div>
               
              </div>
              <div class="card-footer">
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
              </div>
            </div>
           
            
            <!-- Modal Comentario -->
            <div class="modal fade" id="ModalComentario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Envie comentarios y sugerencias</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <textarea name="comentario" id="comentario" rows="10" class="form-control"></textarea>
                  </div>
                  <div class="modal-footer">
                    
                    <button type="button" class="btn btn-sm btn-outline-success">Enviar Comentarios</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary " data-dismiss="modal">Cerrar</button>
                  </div>
                </div>
              </div>
            </div>
             <!-- Modal Venta-->
             <div class="modal fade" id="ModalVenta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Comprando Producto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                   Detalle del producto
                  </div>
                  <div class="modal-footer">
                   
                    <button type="button" class="btn btn-sm btn-outline-success" data-toggle="modal" data-target="#valoracion"  data-dismiss="modal">Confirmar Compra</button>
                    <button type="button" class="btn btn-sm btn-outline-danger " data-dismiss="modal">Cancelar</button>
                  </div>
                </div>
              </div>
            </div>


<!-- Modal Valoracion -->
<div class="modal fade" id="valoracion" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Valora tu experiencia</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="clasificacion">
          <input id="radio1" type="radio" name="estrellas" value="5"><!--
          --><label for="radio1">★</label><!--
          --><input id="radio2" type="radio" name="estrellas" value="4"><!--
          --><label for="radio2">★</label><!--
          --><input id="radio3" type="radio" name="estrellas" value="3"><!--
          --><label for="radio3">★</label><!--
          --><input id="radio4" type="radio" name="estrellas" value="2"><!--
          --><label for="radio4">★</label><!--
          --><input id="radio5" type="radio" name="estrellas" value="1"><!--
          --><label for="radio5">★</label>
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Enviar Valoracion</button>
      </div>
    </div>
  </div>
</div>
          </div>
          @endforeach
        

 
        </div>
        {{$productos->links()}}
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="{{asset("templatemain/vendor/jquery/jquery.min.js")}}"></script>
  <script src="{{asset("templatemain/vendor/bootstrap/js/bootstrap.bundle.min.js")}}"></script>

    </body>
</html>
