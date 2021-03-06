<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/


//authentication routes



//application routes


Route::group(['middleware' => ['web']], function () {

  Route::get("/", "HomeController@welcome");
  Route::get("/tasks", "TaskController@index");
  Route::post("/task", "TaskController@store");
  Route::delete("/task/{task}", "TaskController@destroy");
  Route::post("/doneTask/{task}", "TaskController@done");
  Route::post("/undoneTask/{task}", "TaskController@undone");
  Route::get("/dashboard", "TaskController@dashboard");
  Route::get("/tasks/add", "TaskController@add");
  Route::post("/tasks/add", "TaskController@addNew");


  Route::auth();

});

