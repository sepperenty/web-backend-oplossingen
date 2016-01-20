@extends('layouts.app')

@section('content')

	<h1>Index</h1>

	<form action="{{ url('/add/') }}" method="post">
			<label for="task"> add new todo</label>
			<input type="text" name="task">
			<input type="submit" value="add">
	</form>

	@if(count($todo)>0)
			<h3>todo</h3>
		@foreach($todo as $task)
			
			<p>{{$task->task}}</p>

			<form action="{{url('/delete/' . $task->id)}}" method="post">
				 {{ csrf_field() }}
           		 {{ method_field('DELETE') }}

           		<input type="submit" value="delete">


			</form>
			<form action="{{url('/done/' . $task->id)}}" method="post">
				

           		<input type="submit" value="done">


			</form>

		@endforeach

	@endif
	
	@if(count($done)>0)
			<h3>done</h3>
		@foreach($done as $task)
			
			<p>{{$task->task}}</p>

			<form action="{{url('/delete/' . $task->id)}}" method="post">
				 {{ csrf_field() }}
           		 {{ method_field('DELETE') }}

           		<input type="submit" value="delete">


			</form>
			<form action="{{url('/undone/' . $task->id)}}" method="post">
				

           		<input type="submit" value="undone">


			</form>

		@endforeach

	@endif

	

@stop