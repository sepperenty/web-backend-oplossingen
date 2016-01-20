<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Todo;



class todoController extends Controller
{
   
	public function index(){
		$todo = Todo::where("done", "!=", "1")->get();
		$done = Todo::where("done", "=", "1")->get();
		return view("index", compact("todo", "done"));
	}


	public function add(Request $request){
		$todo = new Todo;
		$todo->task = $request->task;
		$todo->done = "0";
		$todo->save();
		 return redirect('/');

	}

	public function delete(Todo $todo){
		$todo->delete();
		return redirect("/");

	}

	public function makeDone(Todo $todo){
		$todo->done = "1";
		$todo->save();
		return redirect("/");

	}

	public function makeUndone(Todo $todo){
		$todo->done="0";
		$todo->save();
		return redirect("/");
	}


}
