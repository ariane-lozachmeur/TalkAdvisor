<?php

namespace App\Http\Controllers;

use Request;
use App\Review;
use App\Ratings;
use App\Speaker;
use App\review_options;


use App\Http\Requests;

class PagesController extends Controller
{

	public function home(){
		$controller1 = new speakerController;
		$controller2 = new reviewController;
		
		$data=[];
		$data['speakers']=$controller1->index();
		$data['bestspeakers']=$controller1->getBest(5);
		$data['reviews']= $controller2->getLast(5);
		return view('homepage',$data);
	}
	
	 public function getPage($type){
		if ($type == 'review'){
			$controller = new ReviewController;
			$reviews = $controller->index();
			return  view('reviews',$reviews);
		}
		if ($type=='speaker'){
			$controller = new SpeakerController;
			$speakers = $controller->getBest(10);
			return 'Encore à faire !';
		}
		else {
			return 'Sorry, this page doesn\'t exist';
		}
	} 
	
	public function getPage2($type,$id){
		
		if ($type=='speaker'){
			$controller1 = new SpeakerController;
			$controller2 = new ReviewController;
			$controller3= new RatingsController;
			$data=[];
			$data['speaker'] = $controller1->getSpeaker($id);
			$data['reviews'] = $controller2->getReview($id);
			$data['options'] = review_options::all();
			return view('speaker',$data);
		}
		else {
			return 'Sorry, this page doesn\'t exist';
		}
	}
	
	public function postReview(){
		
		$input=Request::all();
		$review = new Review;
		$review->comment=$input['body'];
		$review->quote=$input['quote'];
		$review->talk_id=1; 							// TODO : To modify when we link talks to reviews
		$review->speaker_id=$input['id'];
		$review->user_email='ariane@gmail.com'; 		// TODO : it has to be the user's email !!
		$review->user_name = 'Ariane';
		$review->save();
	
		// We need to know the id of the review we created :
		$latest = Review::orderBy('id','desc')->first();
		$id = $latest->id;
		 
		$speaker= Speaker::find($input['id']);
		$number = $speaker->number_reviews;
		for ($i=1;$i<=5;$i++){
			$ratings = new Ratings;
			$ratings->review_id=$id;
			$ratings->rating_option_id=$i;
			$ratings->score=$input[$i];
			$ratings->save();
		}
		 
		// updating the average
		$speaker->average_1 = ($number*$speaker->average_1 + $input[1])/($number+1);
		$speaker->average_2 = ($number*$speaker->average_2 + $input[2])/($number+1);
		$speaker->average_3 = ($number*$speaker->average_3 + $input[3])/($number+1);
		$speaker->average_4 = ($number*$speaker->average_4 + $input[4])/($number+1);
		$speaker->average_5 = ($number*$speaker->average_5 + $input[5])/($number+1);
		 
		// updating the number of reviews
		$speaker->number_reviews++;
		$speaker->save();
	
		$pagesController = new PagesController;
		return $pagesController->getPage2('speaker',$input['id']);
	}
}

?>