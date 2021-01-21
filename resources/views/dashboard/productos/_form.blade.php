
    
    
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
                <input type="number" name="precio" class="form-control" id="precio" value="{{old('precio',$producto->precio)}}">
          
            </div>
            <div class="form-group">
                <label for="cantidad" class="bmd-label-floating">Cantidad</label>
                <input type="number" name="cantidad" class="form-control" id="cantidad" value="{{old('precio',$producto->cantidad)}}">
          
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
            <div class="form-group dropdown">
                <label for="category_id" class="bmd-label-floating"> Subcategorias</label>
               
          <select multiple name="subcategory_id[]" class="form-control col-6 " id="category_id" >
          
            @foreach ($listSubcategorias  as $nombre=>$id)
            <option {{in_array($id, old('subcategory_id')?:$producto->subcategorias->pluck('id')->toArray()) ?"selected":"" }}  class="dropdown-item" aria-labelledby="dropdownMenuButton" value="{{$id}}">{{$nombre}}</option>
            
                @endforeach
          
           

          </select>
        
        
            </div>
            <div class="form-group">
                <label for="user_id"  class="bmd-label-floating">Usuario</label>
                <input type="hidden" name="user_id"readonly class="form-control"  id="user_id" value="{{auth()->user()->id}}">
                <input type="text" name=""readonly class="form-control btn btn-secondary" id="" value="{{auth()->user()->name}}">

            </div>
        
              <input type="submit" class="btn btn-success  btn-round" value="Guardar">
         
   
      




