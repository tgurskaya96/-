<?php
namespace App\Providers\ViewProviders;
use Illuminate\Contracts\View\View;
use App\Categories;
use App\subscribe;
use Auth;
class BaseComposer{
	public function compose(View $view){
		if (!Auth::guest()){
			$subs=subscribe::where('user_id',Auth::user()->id)->orderBy('id','DESC')->first();
			if(isset($subs->body)){
			$arr=unserialize($subs->body);
			}
			else{
				$arr=[];
			}
		}
		else{
			$subs=new subscribe;
			$arr=[];
		}
		$cats=Categories::where('showhide','show')->get();
		$view->with('cats',$cats)->with('arr',$arr);
		//dd($arr);
			
	}
}