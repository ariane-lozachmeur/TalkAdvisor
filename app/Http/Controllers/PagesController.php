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
		return $homeController->index();
	}
	
	 public function getPage($type){
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
	
	public function getPage2($type,$id){
		
		if ($type=='speaker'){
			$speakerController = new SpeakerController;
			$data = $speakerController->show($id);
			return view('speaker',$data);
		}
		
		else {
			return 'Sorry, this page doesn\'t exist';
		}
	}

}

?>