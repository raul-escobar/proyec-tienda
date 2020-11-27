
<table class="table">
    <thead>
        <tr style="color:#FF7126 ">
           
            <td>
                Nombre Beneficiario
            </td>
            
            
            <td>
              CI
          </td>
          <td>
            Distrito
        </td>
         
      
    <td>
      Fecha de registro
  </td>
          
            <td>
                Acciones
            </td>
        </tr>
    </thead>
    <tbody>
  
        @foreach ($Registros as $formulario)
        <tr>
           
            <td>
                {{$formulario->beneficiario}}
            </td>
           
            
            <td>
              {{$formulario->ci}}
          </td>
          <td>
            @if ($formulario->distrito!=null)
            {{$formulario->distrito->nombre}}
  
            @endif
        </td>
         
      
    <td>
      {{$formulario->created_at->format('d-M-Y')}}
  </td>
            
            <td>
                <a href="{{route('showreport',$formulario->id)}}" class="btn btn-primary btn-sm btn-round"> Detalle</a>
               
              
               
                    
               
  
  
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>  