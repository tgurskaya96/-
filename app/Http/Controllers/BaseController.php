<?php

namespace App\Http\Controllers;
use App\Products;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function getIndex(){
		$tovars=Products::where('showhide','show')->orderBy('id','DESC')->limit(10)->get();
		return view('index')->with('tovars',$tovars);
	}

}
