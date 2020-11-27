<nav class="navbar navbar-expand-lg navbar-light bg-light">
<a class="navbar-brand" href="{{route('home')}}">Alimento Bus Solidario</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Navegacion
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{route('distrito.index')}}">Distritos</a>
            <a href="{{route('formulario.index')}}" class="dropdown-item">Registros Personales</a>
            
@if (auth()->user()->rol_id==2)
    

<a href="{{route('reporte')}}" class="dropdown-item">Reportes</a>
<a href="{{route('IndexUsers')}}" class="dropdown-item">Registros Totales</a>
<a class="dropdown-item" href="{{route('user.index')}}">Usuarios</a>
<a class="dropdown-item" href="{{route('importarShow')}}">Importar Registros</a>


@endif


          



            </div>
        </li>
        <li class="nav-item">
        </li>
        <li class="nav-item">
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
       
      </ul>
      
     
    </div>
  </nav>