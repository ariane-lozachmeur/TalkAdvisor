<?php

namespace App\Http\Controllers;

use Request;
use App\Review;
use App\Ratings;
use App\Speaker;
use App\Http\Requests;
use App\User;
use App\Http\Controllers\SpeakerController;


class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    
    {
        $reviews = Review::all();
        return $reviews;
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $review = Review::findOrFail($id);
        
        // TODO
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function getReview($id){					
    	$reviews = Review::where('speaker_id',$id)->get();
    	return $reviews;
    }
    
    public static function getLast($number){
    	$reviews=Review::orderBy('created_at','desc')->take($number)->get();
    	return $reviews;
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
	
    	/* $data=[];
    	$data['speaker']=$speaker;
    	$data['reviews']= ReviewController::getReview($id);
    	
    	return view('speakerProfile',$data); */
   		$pagesController = new PagesController;
    	return $pagesController->speakerProfile($input['id']);
    }
}
