
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
     <li class="nav-item {{ Request::path()=='dashboard/main' ? 'active':''}}">
      <a class="nav-link" href="{{route('main.index')}}">
        <i class="material-icons">location_city</i>
        <p>Dashboard</p>
      </a>
    </li>
    <li class="nav-item {{ Request::path()=='dashboard/cat' ? 'active':''}}">
      <a class="nav-link" href="{{route('cat.index')}}">
        <i class="material-icons">location_city</i>
        <p>Categorias</p>
      </a>
    </li>
    <li class="nav-item {{ Request::path()=='dashboard/user' ? 'active':''}}">
      <a class="nav-link" href="{{route('user.index')}}">
        <i class="material-icons">assignment_ind</i>
        <p>Usuarios</p>
      </a>
    </li>
     @endif
      
      
      <li class="nav-item {{ Request::path()=='dashboard/producto' ? 'active':''}}">
        <a class="nav-link" href="{{route('producto.index')}}">
          <i class="material-icons">library_books</i>
          <p>Productos</p>
        </a>
      </li>
     
   
   
     
  
      <li class="nav-item active-pro mb-3">
        <p class="nav-link alert alert-success ">
          <i class="material-icons text-white">person</i>
        <label for="" class="text-white ">Usuario:{{auth()->user()->name}}</label>
        <br>
        <i class="material-icons text-white">task</i>
        <label for="" class="text-white ">Rol:{{auth()->user()->rol->nombre}}</label>
        </p>
        
        
      </li>
     
    </ul>
  </div>
</div>