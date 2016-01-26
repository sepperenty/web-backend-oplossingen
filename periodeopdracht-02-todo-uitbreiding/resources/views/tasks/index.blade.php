

@extends('layouts.app')

@section('content')

        <!-- Bootstrap Boilerplate... -->



<div class="panel-body">
    <!-- Display Validation Errors -->
    @include('common.errors')


       <h1>De TODO-app</h1>

</div>

@if(count($tasks) > 0 || count($doneTasks) > 0)

    <a id="newTaskLink" href="tasks/add">Nieuwe task</a>

<!-- TODO: Current Tasks -->




@if (count($tasks) > 0)
    <div class="panel panel-default todoList">
        <div class="panel-heading">
           <h3> Current Tasks</h3>
        </div>

        <div class="panel-body">
            <table class="table table-striped task-table">

                <!-- Table Headings -->
                <thead>
                <th>Task</th>
                <th>&nbsp;</th>
                </thead>

                <!-- Table Body -->
                <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <!-- Task Name -->
                        <td class="table-text col-md-5">
                            <div>{{ $task->name }}</div>
                        </td>

                        <td class="col-md-5">
                            <form action="{{ url('task/'.$task->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button>Delete Task</button>
                            </form>


                        </td>
                        <td>
                            <form action="{{ url('doneTask/'.$task->id) }}" method="POST">
                                {{ csrf_field() }}


                                <button>Done</button>
                            </form>


                        </td>


                    </tr>


                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @else
    <p  class="message">Alright, all done</p>
@endif



@if (count($doneTasks) > 0)
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3> Done Tasks</h3>
        </div>

        <div class="panel-body">
            <table class="table table-striped task-table">

                <!-- Table Headings -->
                <thead>
                <th>Done Tasks</th>
                <th>&nbsp;</th>
                </thead>

                <!-- Table Body -->
                <tbody>
                @foreach ($doneTasks as $task)
                    <tr>
                        <!-- Task Name -->
                        <td class="table-text col-md-5">
                            <div><p class="done">{{ $task->name }}</p></div>
                        </td>

                        <td class="col-md-5">
                            <form action="{{ url('task/'.$task->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button>Delete Task</button>
                            </form>


                        </td>
                        <td>
                            <form action="{{ url('undoneTask/'.$task->id) }}" method="POST">
                                {{ csrf_field() }}


                                <button>Undone</button>
                            </form>


                        </td>


                    </tr>


                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @else

    <p class="message">Damn, werk aan de winkel...</p>
@endif
@else

        <p id="newTaskLink">Nog geen tasks  <a href="tasks/add">Nieuwe task toevoegen</a>  </p>

@endif
@endsection