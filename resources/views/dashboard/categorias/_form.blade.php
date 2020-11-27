
    
    
            @csrf
            <div class="form-group">
                <label for="nombre" class="bmd-label-floating">Nombre</label>
            <input type="text" name="nombre" class="form-control" id="nombre" value="{{old('nombre',$categoria->nombre)}}">
                @error('nombre')
    
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="detalle" class="bmd-label-floating">Detalle</label>
                <input type="text" name="detalle" class="form-control" id="detalle" value="{{old('detalle',$categoria->detalle)}}">
          
            </div>
           
            
              <input type="submit" class="btn btn-success  btn-round" value="Guardar">
         
   
      




