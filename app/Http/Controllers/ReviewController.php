<?php

namespace App\Http\Controllers;

use Request;
use App\Review;
use App\Ratings;
use App\Speaker;
use App\Http\Requests;
use App\User;
use App\Http\Controllers\SpeakerController;
use App\Gestion\ReviewGestion;
use App\Gestion\ReviewGestionInterface;

class ReviewController extends Controller {
	protected $reviewRepository;
	protected $reviewPerPage = 5;
	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view ( 'partials.ratingForm' );
	}
	
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request        	
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request, $speaker_id) {
		$input = Request::all ();
		
		// Creating the review
		$review = new Review ();
		$review->comment = $input ['comment'];
		$review->quote = $input ['quote'];
		$review->talk_id = null; // TODO : To modify when we link talks to reviews
		$review->speaker_id = $speaker_id;
		$review->user_id = \Auth::id ();
		$review->save ();
		
		// We need to know the id of the review we created :
		$latest = Review::orderBy ( 'id', 'desc' )->first ();
		$latest_id = $latest->id;
		
		// Now we can create the rating
		$ratingController = new RatingsController ();
		$ratingController->store ( $input, $latest_id );
		
		// updating the speaker
		$speakerController = new SpeakerController ();
		$speakerController->update ( $input, $speaker_id );
		
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
	public function getCommentOn($id) {
		$reviews = Speaker::find ( $id )->reviews ()->where ( 'comment', '!=', "" )->latest ( 'created_at' )->paginate ( 3 );
		return $reviews;
	}
	
	// extracts the quotes of the speaker from the reviews
	public function getQuoteOf($id) {
		$quotes = Speaker::find ( $id )->reviews ()->where ( 'quote', '!=', "" )->latest ( 'created_at' )->lists ( 'quote' );
		return $quotes;
	}
	
	// return the $number last comment on the site
	public static function getLastComments($n) {
		$commentReviews = Review::where ( 'comment', '!=', "" )->latest ( 'created_at' )->paginate ( $n );
		return $commentReviews;
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
