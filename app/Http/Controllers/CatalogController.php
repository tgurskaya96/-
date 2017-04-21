<?php

namespace App\Http\Controllers;
use App\Products;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
        public function getCatalog($id)
    {
		//echo $id;
		$tovars=Products::where('categories_id',$id)->orderBy('id','DESC')->get();
		return view('index')->with('tovars',$tovars);
    }
}


