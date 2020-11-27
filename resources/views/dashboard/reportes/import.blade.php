@extends('dashboard.master')   
@section('content')
<div class="flex-center position-ref full-height">
    <div class="card">
        <div class="card-header card-header-success">
          <h4 class="card-title">
          Importar datos desde excel
          </h4>
          <div class="card-category">
           Debe de tener el formato correcto para importar satisfactoriamente</div>
        </div>
       
        <div class="card-body">   
 

      @if ( $errors->any() )

          <div class="alert alert-danger">
              @foreach( $errors->all() as $error )<li>{{ $error }}</li>@endforeach
          </div>
      @endif

      @if(isset($numRows))
          <div class="alert alert-sucess">
              Se importaron {{$numRows}} registros.
          </div>
      @endif

        <form action="{{route('importar')}}" method="post" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="row">
              <div class="col-12">
                  <div class="card_header card-header-info table-responsive">
                    
                    <label class="card-category" for="alumnos">Seleccionar archivo</label>

                      <input type="file" name="registros" class="" id="registros">
                  </div>
                  <div class="mt-3">
                      <button type="submit" class="btn btn-success btn-round">Importar</button>
                  </div>
              </div>
          </div>
      </form>
  </div>
</div>


@include('dashboard.reportes.slider')

</div>




@endsection