


@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Voeg een TODO-item toe</h1>
    <a href="../tasks"> Terug naar TODO list </a>





    <form action="{{ url('tasks/add') }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}




                <!-- Task Name -->
        <div class="form-group addTask">


            <label for="task-name" class="control-label">Task</label>

            <input type="text" name="name" id="task-name" class="form-control">

        </div>

        <!-- Add Task Button -->
        <div class="form-group">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i> Add Task
                </button>

        </div>
        </form>

</div>


@endsection