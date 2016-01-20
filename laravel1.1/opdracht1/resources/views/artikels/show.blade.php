@extends("master")

@section("content")

	<h1>{{$artikel->titel}}</h1>
	<p>{!! nl2br($artikel->artikel)!!}</p>
	<p>{{$artikel->kernwoorden}}</p>

 @stop