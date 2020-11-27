@foreach ($listCategories  as $title=>$id)
<option {{$post->category_id==$id ?'selected="selected"':''}} value="{{$id}}">{{$title}}</option>
    @endforeach