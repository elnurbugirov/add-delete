@foreach($data as $d)
    <a href="{{ ('country/'.$d->slug)}}">{{$d->display_name}} <br></a>
@endforeach
