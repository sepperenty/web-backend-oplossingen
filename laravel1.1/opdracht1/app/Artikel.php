<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
   /* public function getBieren()
    {
    	return DB::table("bieren")->get();
    }

    public function getBierById($id)
    {
    	return DB::table("bieren")->find($id);
    }*/

    protected $fillable = ["titel", "artikel", "kernwoorden"];

}
