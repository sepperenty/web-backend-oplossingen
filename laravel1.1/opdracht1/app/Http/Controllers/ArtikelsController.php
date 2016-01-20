<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Artikel;

	class ArtikelsController extends Controller
{
	private $artikel;

	public function __construct(Artikel $artikel)
	{
		$this->artikel = $artikel;
	}


    public function index()
    {
    	$artikels = $this->artikel->get();

    	return view("artikels.index", compact("artikels"));
    }

    public function show(Artikel $artikel)
    {
    	
    	return view("artikels.show", compact("artikel"));
    }

    public function edit(Artikel $artikel)
    {
    	
    	return view("artikels.edit", compact("artikel"));
    }

    public function update(Artikel $artikel, Request $request)
    {
        
        $artikel->fill($request->input())->save();
        $artikel->save();
        return redirect("artikels");

    }

 }
