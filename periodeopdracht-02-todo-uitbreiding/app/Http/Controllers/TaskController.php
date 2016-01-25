<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Task;
use App\Repositories\TaskRepository;

class TaskController extends Controller
{
    //
    protected $tasks;

    public function __construct( TaskRepository $tasks)
    {
        $this->middleware("auth");
        $this->tasks= $tasks;
    }




    public function index(Request $request)
    {
        $tasks = $this->tasks->forUser($request->user());
        $doneTasks = $this->tasks->doneForUser($request->user());

        return view('tasks.index', compact("tasks", "doneTasks"));
    }

    public function add()
    {
        return view("tasks.add");
    }

    public function addNew(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        $request->user()->tasks()->create([
            'name' => $request->name,
            'done' => "0",
        ]);

        \Session::flash("notification", "your task is created");
        return redirect("/tasks");
        //create task
    }

    public function destroy(Task $task)
    {
        $this->authorize("destroy", $task);
        $task->delete();
        \Session::flash("notification", "your task is destroyed");
        return redirect("/tasks");
    }

    public  function done(Task $task)
    {
        $this->authorize("done", $task);
        $task->done = "1";
        $task->save();
        \Session::flash("notification", "your task is changed from undone to done");
        return redirect("/tasks");
    }

    public  function undone(Task $task)
    {
        $this->authorize("done", $task);
        $task->done = "0";
        $task->save();
        \Session::flash("notification", "your task is changed from done to undone");
        return redirect("/tasks");
    }

    public function dashboard()
    {
        return view("tasks.dashboard");
    }


}
