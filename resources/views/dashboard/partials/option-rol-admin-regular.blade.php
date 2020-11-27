@foreach ($listRols  as $rols=>$id)
<option {{$user->rol_id==$id ?'selected="selected"':''}} value="{{$id}}">{{$rols}}</option>

    @endforeach