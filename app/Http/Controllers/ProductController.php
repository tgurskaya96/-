<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Products;
class ProductController extends Controller
{
  public function getIndex($id=null){
	
	   $y=Products::where('id',$id)->first();
	   return view('product')->with('y',$y);
  }  
 
}
