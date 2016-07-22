<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use App\Ratings;
use App\Speaker;
use App\Http\Requests;
use App\User;
use App\Http\Controllers\SpeakerController;
use App\Gestion\ReviewGestion;
use App\Gestion\ReviewGestionInterface;

class ReviewController extends Controller {
		
	 /**
     * Create a new review instance after a valid registration.
     *
     * @param  array  $data
     * @return Review
     */
	
	public static function create(array $data){
		return Review::create([
				'comment' => $data['comment'],
				'quote' => $data['quote'],
				'talk_id' => $data['talk_id'],
				'speaker_id' => $data['speaker_id'],
				'user_id' => $data['user_id'],
				]);
	}
	
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request        	
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request, $speaker_id) {
		$input = $request->all();
		
		// Filling the last informations
		$input['speaker_id']= $speaker_id;
		$input['talk_id'] = null; 					//TODO : link talks and reviews
		$input['user_id']=\Auth::id();
		
		// Creating the review
		$review = ReviewController::create($input);
		
		// We need to know the id of the review we created :
		$latest = Review::orderBy ( 'id', 'desc' )->first ();
		$latest_id = $latest->id;
		
		// Now we can create the rating
		$ratingController = new RatingsController ();
		$ratingController->store( $input, $latest_id );
		
		// Updating the speaker
		$speakerController = new SpeakerController ();
		$speakerController->update( $input, $speaker_id );
		
		\Session::flash ( 'flash_message', 'Your review has been posted succesfully' );
		$pagesController = new PagesController ();
		return $pagesController->getPage2 ( 'speaker', $speaker_id );
	}
	
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param int $id        	
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		// TODO
	}
	
	/**
	 * Update the specified resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request        	
	 * @param int $id        	
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		// TODO
	}
	
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param int $id        	
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		// TODO
	}
	
	// extracts the comment of the speaker for the reviews
	public function getCommentsOn($id) {
		$ratingController=new RatingsController();
		
		$reviews = Speaker::find ($id)->reviews()->where ( 'comment', '!=', "" )->latest ( 'created_at' )->paginate(5);
		$ratings=[];
		$users=[];
		$i=0;
		foreach ($reviews as $review){
			$users["$i"] = User::find($review->user_id);
			$ratings["$i"] = $ratingController->getRatings($review->id);
			$i++;
		}
		
		return ['reviews'=>$reviews,'ratings'=>$ratings,'users'=>$users];
	}
	
	// extracts the quotes of the speaker from the reviews
	public function getQuoteOf($id) {
		$quotes = Speaker::find ( $id )->reviews ()->where ( 'quote', '!=', "" )->latest ( 'created_at' )->lists ( 'quote' );
		return $quotes;
	}
	
	// return the $number last comment on the site
	public static function getLastComments($n) {
		$ratingController=new RatingsController();
		
		$reviews = Review::where ( 'comment', '!=', "" )->latest ( 'created_at' )->paginate ( $n );
		$ratings=[];
		$users=[];
		$speakers=[];
		$i=0;
		foreach ($reviews as $review){
			$users["$i"] = User::find($review->user_id);
			$speakers["$i"] = Speaker::find($review->speaker_id);
			$ratings["$i"] = $ratingController->getRatings($review->id);
			$i++;
		}
		return ['reviews'=>$reviews,'ratings'=>$ratings,'users'=>$users,'speakers'=>$speakers];
	}
	
	// return $n quotes chosen randomly. We turn the result in a plain array to simply the displaying of them
	public function getRandomQuotes($n) {
		$quotesRaw = Review::where ( 'quote', '!=', "" )->lists('quote','speaker_id')->random($n);
		$quotes=[];
		foreach($quotesRaw as $speaker_id=>$quote){
			$speaker=Speaker::find($speaker_id);
			$speaker_name=$speaker->speaker_name;
			$speaker_photo=$speaker->speaker_photo;
			$quotes[$speaker_id]=['quote'=>$quote,'id'=>$speaker_id,'name'=>$speaker_name,'photo'=>$speaker_photo];
			
		}
		return $quotes;
	}
}
