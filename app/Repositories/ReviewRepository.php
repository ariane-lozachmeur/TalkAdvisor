<?php

namespace App\Repositories;

use App\Review;

class ReviewRepository implements ReviewRepositoryInterface
{

	protected $review;
	
	public function __construct(Review $review)
	{
		$this->review = $review;
	}

	public function save($input)
	{
		/* Other way :
		 * $input['user_id'] = ...
		 * Review::create($input);
		 */
		
		$review = new $this->review;
		$review->comment=$input['comment'];
		$review->quote=$input['quote'];
		$review->talk_id=1; 							// TODO : To modify when we link talks to reviews
		$review->speaker_id=$input['speaker_id'];
		$review->user_id=2;								//TODO : get the real id
		$review->save();
	}
	
	public function getPaginate($n)
	{
		return $this->review->paginate($n);
	}

	
	public static function getLast($number){
		$reviews=$this->review->latest('created_at')->take($number)->get();
		return $reviews;
	}
}