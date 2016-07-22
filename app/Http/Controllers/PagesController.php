<?php

namespace App\Http\Controllers;

use Request;
use App\Review;
use App\Ratings;
use App\Speaker;
use App\Http\Requests;
use App\Gestion\ReviewGestionInterface;
use App\Gestion\ReviewGestion;
use App\Http\Requests\ReviewRequest;
use App\Repositories\ReviewRepository;
use App\ratingoptions;


class PagesController extends Controller
{

	public function home(){
		$homeController = new HomeController();
		$data = $homeController->index();
		return view('homepage',$data);
	}
	
	 public function getPage($type1){
		/*if ($type == 'review'){
			$controller = new ReviewController;
			$reviews = $controller->index();
			$ratings=[];
			$i=0;
			foreach ($reviews as $review){
				$ratings["$i"]=$controller3->getRatings($review->id);
				$i++;
			}
			$data['reviews']=$reviews;
			$data['ratings']=$ratings;
			$data['page']= $type;
			return  view('reviews',$data);
		}
		if ($type=='speaker'){
			$controller = new SpeakerController;
			$speakers = $controller->getBest(10);
			return 'Encore à faire !';
		}
		else {
			return 'Sorry, this page doesn\'t exist';
		}*/
	} 
	
	public function getPage2($type1,$type2){
		
		if ($type1=='speaker'){
			$speakerController = new SpeakerController;
			$data = $speakerController->show($type2);
			return view('speaker',$data);
		}
		else if ($type1=='user') {
			$userController = new UserController();
			$data = $userController->show($type2);
			return view('user',$data);
		}
		else {
			return 'Sorry, this page doesn\'t exist';
		}
	}

}

?>