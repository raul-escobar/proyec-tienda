
<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('images/fondo2.jpeg') }}">
  <!--
    Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

    Tip 2: you can also add an image using data-image tag
-->
  <div class="logo">	  <img src="{{ asset('images/logo.png') }}" alt="..." class="img-thumbnail rounded ml-4" style="width: 150px">

  
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
     
      @if (auth()->user()->rol_id==3 || auth()->user()->rol_id==2)
      @if (auth()->user()->rol_id==3)
      <li class="nav-item {{ Request::path()=='dashboard/main' ? 'active':''}}">
        <a class="nav-link" href="{{route('main.index')}}">
         
          <p>Dashboard</p>
        </a>
      </li>
      @endif
    
     
     
     <li class="nav-item {{ Request::path()=='dashboard/cat' ? 'active':''}}">
       <a class="nav-link" href="{{route('cat.index')}}">
        
         <p>Categorias</p>
       </a>
     </li>
     <li class="nav-item {{ Request::path()=='dashboard/user' ? 'active':''}}">
       <a class="nav-link" href="{{route('user.index')}}">
        
         <p>Usuarios</p>
       </a>
     </li>
      @endif
       @if (auth()->user()->rol_id==4)
       <li class="nav-item {{ Request::path()=='dashboard/ventas' ? 'active':''}}">
        <a class="nav-link" href="{{route('ventas.contador')}}">
         
          <p>Ventas</p>
        </a>
      </li>
       @endif
     
       <li class="nav-item {{ Request::path()=='dashboard/producto' ? 'active':''}}">
         <a class="nav-link" href="{{route('producto.index')}}">
           
           <p>Productos</p>
         </a>
       </li>
      
       <li class="nav-item dropdown ml-auto">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Bienvenid@! {{auth()->user()->name}}
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('logout') }}"
             onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
Cerrar sesion
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
          </form>
      </div>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="{{route('home')}}">
          
          <p>Ir a la tienda</p>
        </a>
      </li>
    </ul>
  </div>
</div>