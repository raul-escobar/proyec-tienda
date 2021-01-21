@extends('dashboard.master')   
@section('content')
<div class="table-responsive">
  <div class="card">
  <div class="card-header card-header-warning">
    <h4 class="card-title">
      Listado de Productos que compraste
    </h4>
    <div class="card-category">
    Total de productos comprados: {{$total}}</div>
  </div>
  <div class=" ml-1 form-inline table-responsive">

  </div>
  <div class="card-body table-responsive">
    <table class="table table-shopping">
      <thead>
          <tr style="color:#FF7126 ">
             
              <td>
                  Nombre Producto
              </td>
              
              
              <td>
                Vendedor
            </td>
            
           
            
              <td>
                  Pagado
              </td>
          </tr>
      </thead>
      <tbody>
  
          @foreach ($comprados as $comprado)
          <tr>
             
              <td>
                  {{$productos->find($comprado->product_id)->nombre}}
              </td>
             
              
              <td>
                {{$usuarios->find($comprado->vendedor_id)->name}}
            </td>
            
          
  
           <td>
          
           
{{$comprado->total}}
          
        </td>
           
             
          </tr>
          @endforeach
      </tbody>
  </table>  
  </div>
  
</div>

</div>



    

      






@endsection