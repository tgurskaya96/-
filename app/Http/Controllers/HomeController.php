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
		$r['user_id']= Auth::user()->id;
		$r['body']='-';
		unset($r['_token']);
		subscribe::create($r->all());
		return redirect('home');
    }
}
