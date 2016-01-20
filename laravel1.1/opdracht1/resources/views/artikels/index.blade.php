@extends("master")

@section("content")

		<h1>Lijst met artikels</h1>

		@foreach($artikels as $artikel)
			
			<a href="artikels/{{$artikel->id}}"><li>{{$artikel->titel}}</li></a>

		@endforeach

@stop