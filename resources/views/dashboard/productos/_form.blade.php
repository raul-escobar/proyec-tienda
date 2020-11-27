
    
    
            @csrf
            <div class="form-group">
                <label for="nombre" class="bmd-label-floating">Nombre Producto</label>
            <input type="text" name="nombre" class="form-control" id="nombre" value="{{old('producto',$producto->nombre)}}">
                @error('nombre')
    
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="precio" class="bmd-label-floating">Precio</label>
                <input type="text" name="precio" class="form-control" id="precio" value="{{old('precio',$producto->precio)}}">
          
            </div>
            <div class="form-group">
                <label for="detalle" class="bmd-label-floating">Detalle</label>
                <input type="text" name="detalle" class="form-control" id="detalle" value="{{old('detalle',$producto->detalle)}}">
          
            </div>
          
           
            <div class="form-group dropdown">
                <label for="category_id" class="bmd-label-floating"> Categoria</label>
          <select name="category_id" class="form-control selectpicker" id="category_id"  data-live-search="true">
          
            @foreach ($listCategorias  as $nombre=>$id)
            <option {{$producto->category_id==$id ?'selected="selected"':''}} class="dropdown-item" aria-labelledby="dropdownMenuButton" value="{{$id}}">{{$nombre}}</option>
            
                @endforeach
          
           

          </select>
            </div>
           
        
              <input type="submit" class="btn btn-success  btn-round" value="Guardar">
         
   
      




