@extends('dashboard.master')   
@section('content')

@include('dashboard.partials.validation-error')
<div class="card">
    <div class="card-header card-header-warning">
      <h4 class="card-title">
       Usuario Nuevo
      </h4>
      <div class="card-category">
     Mucha atencion al rol que le asigna</div>
    </div>
   
    <div class="card-body">   
<form action="{{route("user.store")}}" method="POST">
   

 @include('dashboard.user._form')      
</form>
    </div>
</div>
<script>
    $( "#email" ).change(function() {
       $('#email').blur(function(){
           var error_email='';
           var email= $('#email').val();
           var _token=$('input[name="_token"]').val();
           var filter= /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
           if(!filter.test(email))
           {
               $('#error').addClass('has-error');
               $('#error_email').html('<label class="text-danger">Correo Invalido</label>');
               $('#register').attr('disabled','disabled');
           }
           else
           {
               $.ajax({
                  url:"{{route('verificar')}}" ,
                  method:"POST",
                  data:{email:email, _token:_token},
                  success:function(result)
                  {
                      if(result=='unique')
                      {
                          $('#error_email').html('<label class="text-success">Email Disponible</label>');
                          $('#email').removeClass('has-error');
                          $('#register').attr('disabled',false);
                      }
                      else
                      {
                       $('#error_email').html('<label class="text-danger">Email en uso</label>');
                       $('#email').addClass('has-error');
                          $('#register').attr('disabled','disabled');
                      }
                  }
               })
           }
       });
   });
       
    
   </script>
@endsection


