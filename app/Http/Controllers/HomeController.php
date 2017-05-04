<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\subscribe;
use Auth;
use App\Products;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$obj=subscribe::where('user_id',Auth::user()->id)->first();
		if(!$obj){
			$obj=new subscribe;
		}
		$arr=unserialize($obj->body);
		$tovs=collect();
		if($arr){
			foreach($arr as $one){
				if(isset($one)){
			$products=Products::where('categories_id',$one)->get();
			$tovs=$tovs->merge($products);
			}
			}
		}
	
		return view('home')->with('tovs',$tovs);
    }
	
	public function postSubscribe(Requests\SubscribeRequest $r)
    {
		unset($r['_token']);
		$arr=[];
		foreach ($r->all() as $key=>$value){
			$id=(int)$key;
			if($id>0){
				$arr[$id]=$id;
			}
			else{
				$arr_r[]=[];
			}
		}
		$body=serialize($arr);

		$obj=subscribe::where('user_id',Auth::user()->id)->first();
		
		if(isset($obj->id)){
			$obj2=subscribe::where('user_id',Auth::user()->id);
			//$obj2->user_id=Auth::user()->id;
			$obj2->update(array(
			 'type'=>'-',
			 'body'=>$body,
			 'email'=>'-'
			));
		
		}
		else{
			$obj2=new subscribe;
			$obj2->user_id=Auth::user()->id;
		   $obj2->type='-';
		   $obj2->body=$body;
		   $obj2->email='-';
			$obj2->save();
		}

		return redirect('home');
    }
}
