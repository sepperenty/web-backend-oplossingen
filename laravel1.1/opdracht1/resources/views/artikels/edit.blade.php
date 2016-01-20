@extends("master")


@section("content")
	
	
	<h1>edit</h1>


	{!!Form::model($artikel, ["url" => "artikels/".$artikel->id, "method"=>"PATCH"])!!}
		<div class="form-group">
			<label for="titel"></label>
			{!!Form::text ("titel", null, ["class"=>"form-control"])!!}
		</div>

		<div class="form-group">
			{!!Form::textarea("artikel", null, ["class"=>"form-control"])!!}
		</div>
		
		<div class="form-group">		
			{!!Form::text("kernwoorden", null, ["class"=>"form-control"])!!}
		</div>

		<div class="form-group">		
			{!!Form::submit("update artikel",["class"=>"btn btn-primary"])!!}
		</div>
		{!!Form::close()!!}

@stop