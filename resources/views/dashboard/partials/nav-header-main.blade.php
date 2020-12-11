<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
  <div class="container-fluid">
    <div class="navbar-wrapper">
      <label class="navbar-brand" href="javascript:;">Tienda de Calzados</label>
      
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
      <span class="sr-only">Toggle navigation</span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end">
     
      <ul class="navbar-nav">
        
       
        <li class="nav-item dropdown mr-2">
          <a class="nav-link btn btn-info" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="material-icons text-white">account_circle</i><span class="text-white">Tu Cuenta</span> 
            <p class="d-lg-none d-md-block">
            
            </p>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
          <label class="dropdown-item"><i class="material-icons text-dark">face</i>{{auth()->user()->name}}</label>
          <a class="dropdown-item" href="{{route('home')}}"><i class="material-icons text-dark">web</i>Ir a Inicio </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
  <i class="material-icons text-dark">exit_to_app</i> Cerrar sesion
         </a>
         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
        </form>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>