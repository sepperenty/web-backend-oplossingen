<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class pagesController extends Controller
{
    public function index()
    {

    	return view("pages.home");
    }

    public function about()
    {
    	$name = "<em>john doe</em>";
    	$lessions = ["FirstLession", "secondLession", "ThirdLession"];
    	return view("pages.about",compact("lessions", "name"));
    }
}
