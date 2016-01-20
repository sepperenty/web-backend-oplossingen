@extends("master")


@section("content")
		
	<h1>{!!$name!!}</h1>


	@foreach($lessions as $lession)
		
		<p>{{$lession}}</p>

	@endforeach
@stop