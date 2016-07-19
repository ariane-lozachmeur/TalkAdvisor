<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\ratingoptions;


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
        $speakerController = new SpeakerController;
		$reviewController = new ReviewController;	
		$ratingController= new RatingsController;	
		$data=[];
		
		$data['bestspeakers']=$speakerController->getBest(6);
		$commentReviews= $reviewController->getLastComments(3);
		$i=0;
		$ratings=[];
		foreach ($commentReviews as $review){
			$ratings["$i"]=$ratingController->getRatings($review->id);
			$i++;
		}
		$data['speakers']=$speakerController->index();
		$data['commentReviews']=$commentReviews;
		$data['ratings']=$ratings;
		$data['options'] = ratingoptions::all();
		$data['quotes'] = $reviewController->getRandomQuotes(3);
		$data['page']= 'home';
		
		return view('homepage',$data);
    }
}
