<?php

namespace App\Http\Controllers;

use Request;

use App\Http\Requests;
use App\Speaker;
use Session;

class FormController extends Controller
{
	public function search(){
		$controller = new PagesController;
		$name=Request::all()['name'];
		$speaker=Speaker::where('speaker_name',$name)->first();
		if ($speaker===null) { 		
			\Session::flash('search_error',"Sorry the speaker $name has not been created yet");
			return redirect('/' );
		}
		return redirect("speaker/$speaker->id");
	}
	
	public function postReview(Request $request, $type,$id){
		if ($type=='speaker'){
			if (array_key_exists('1',Request::all())){
				$controller=new ReviewController();
				return $controller->store($request,$id);
			}
			else {
				$controller=new SpeakerController;
				return $controller->postVideo($request,$id);
			}
		}
	}
}