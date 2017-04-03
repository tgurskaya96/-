<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\subscribe;
use Auth;

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
        return view('home');
    }
	
	public function postSubscribe(Requests\SubscribeRequest $r)
    {
        //dd($r->all());
		//subscribe::create($r->all());
		unset($r['_token']);
		//$obj=new subscribe;
		//$obj->user_id = Auth::user()->id;
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

		
	//	$arr_r['user_id']=Auth::user()->id;
//		$arr_r['body']=$body;
	//	$arr_r['email']=$r['email'];
	//	$arr_r['status']='-';
		$obj=subscribe::where('user_id',Auth::user()->id)->first();
		//dd($arr_r);
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
		//$obj->body = $body;
	//	$obj->email="";
	//	$obj->type="";
	//	$obj->save();
		return redirect('home');
    }
}
