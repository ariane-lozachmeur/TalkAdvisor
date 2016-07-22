<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Speaker;
use Session;
use App\Http\Controllers\Auth\AuthController;

class FormController extends Controller
{
	public function post(Request $request, $type1){
		if ($type1=='search'){
			$controller = new PagesController;
			$name=$request->all()['speaker_name'];
			$speaker=Speaker::where('speaker_name',$name)->first();
			if ($speaker===null) { 		
				\Session::flash('search_error',"Sorry the speaker $name has not been created yet");
				return redirect('/' );
			}
			return redirect("speaker/$speaker->id");
		}
		else if ($type1=='login'){
			$controller= new AuthController();
			return $controller->login($request);
		}
		else if($type1=='register'){
			$controller= new AuthController();
			\Session::flash('flash_message','Your account has been created successfully.');
			return $controller->register($request);
		}
		else {
			redirect("/");
		}
	}
	
	public function post2(Request $request, $type1,$type2){
		if ($type1=='speaker'){
			if (array_key_exists('1', $request->all())){
				$controller=new ReviewController();
				return $controller->store($request,$type2);
			}
			else {
				$controller=new SpeakerController;
				return $controller->postVideo($request,$id);
			}
		}

	}
}