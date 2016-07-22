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
		
		$data['reviews']=$commentReviews['reviews'];
		$data['ratings']=$commentReviews['ratings'];
		$data['users']=$commentReviews['users'];
		$data['speakers']=$commentReviews['speakers'];
		
		$data['options'] = ratingoptions::all();
		$data['quotes'] = $reviewController->getRandomQuotes(3);
		$data['page']= 'home';
		
		return $data;
    }
}
