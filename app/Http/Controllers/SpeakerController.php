<?php
namespace App\Http\Controllers;

use View;
use Session;
use Request;
use App\Speaker;
use App\ratingoptions;
use App\Http\Controllers\Controller;
use App\Http\Requests\SpeakerFormRequest;
use App\User;

class SpeakerController extends Controller
{
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
    public function index()
    {
      return Speaker::all();
    }
    
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	$speakerController = new SpeakerController;
		$reviewController = new ReviewController;
		$ratingController= new RatingsController;
		
		$data=[];
		$data['speaker'] = $speakerController->getSpeaker($id);
		
		$commentReviews = $reviewController->getCommentsOn($id);
		$data['reviews'] = $commentReviews['reviews'];
		$data['users'] = $commentReviews['users'];
		$data['ratings']=$commentReviews['ratings'];
		
		$data['quotes'] = $reviewController->getQuoteOf($id);
		$data['options'] = ratingoptions::all();
		$data['page']= 'speaker';
		return $data;
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($input, $id)
    {
    	$speaker= Speaker::find($id);
    	$number = $speaker->number_reviews;
    	$speaker->average_1 = ($number*$speaker->average_1 + $input[1])/($number+1);
    	$speaker->average_2 = ($number*$speaker->average_2 + $input[2])/($number+1);
    	$speaker->average_3 = ($number*$speaker->average_3 + $input[3])/($number+1);
    	$speaker->average_4 = ($number*$speaker->average_4 + $input[4])/($number+1);
    	$speaker->average_5 = ($number*$speaker->average_5 + $input[5])/($number+1);
    	$speaker->number_reviews++;
    	$speaker->save();
    }
    
    public function getSpeaker($id)
    {
        $speaker = Speaker::findOrFail($id);
        return $speaker;
    }
    
    public function getBest($number){
    	$speakers=Speaker::orderBy('average_1','desc')->take($number)->get();
    	return $speakers;
    }
    
    public function postVideo($request,$id){
    	$speaker= Speaker::find($id);
    	$string = Request::all()['video'];
    	// some operations have to be done on the url to go from "https://www.youtube.com/watch?v=$key"
    	//													to "https://www.youtube.com/embed/$key"
    	// 1. We get the key which is always behind the "="
    	$key=strrchr($string,"=");
    	// 2. We take of the "=" that is still here. The key is 11 caracters long
    	$key =substr($key,1,11);
    	// 3. We put the key in the right place
    	$video = "https://www.youtube.com/embed/$key";    	 
    	$speaker->video=$video;
    	$speaker->save();
    	
    	\Session::flash('flash_message', 'Your video has been posted succesfully');    	
    	$pagesController = new PagesController;
    	return $pagesController->getPage2('speaker',$id);
    }
}