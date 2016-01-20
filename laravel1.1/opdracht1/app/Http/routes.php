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

/*Route::bind("bier", function($brouwernr)
{
	return App\Bier::whereBrouwernr($brouwernr)->first();
});
*/

Route::bind("artikels", function($artikels){
	return App\Artikel::find($artikels);
});


/*Route::get("/", "pagesController@index");
Route::get("about", "pagesController@about");
Route::get("artikels", "ArtikelsController@index");
Route::get("artikels/{id}", "ArtikelsController@show");
Route::get("artikels/{id}/edit", "ArtikelsController@edit");
Route::patch("artikels/{id}", "ArtikelsController@update");*/
$router->resource("artikels", "ArtikelsController", [
	"only" => ["index", "show", "edit", "update"]

	
	]);

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

Route::group(['middleware' => ['web']], function () {
    //
});
