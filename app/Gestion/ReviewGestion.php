<?php

namespace App\Gestion;

use App\Review;
use App\Ratings;
use App\Speaker;

class ReviewGestion implements ReviewGestionInterface{
	
	public function save($reviewRepository, $input){
		
		// Save the review (see ReviewRepository)
		$reviewRepository->save($input);
		
		// We need to know the id of the review we created :
		$latest = Review::orderBy('id','desc')->first();
		$id = $latest->id;
			
		// Now we can create the rating
		$speaker= Speaker::find($input['id']);
		$number = $speaker->number_reviews;
		for ($i=1;$i<=5;$i++){
			$ratings = new Ratings;
			$ratings->review_id=$id;
			$ratings->rating_option_id=$i;
			$ratings->score=$input[$i];
			$ratings->save();
		}
			
		// updating the averages of the speaker
		$speaker->average_1 = ($number*$speaker->average_1 + $input[1])/($number+1);
		$speaker->average_2 = ($number*$speaker->average_2 + $input[2])/($number+1);
		$speaker->average_3 = ($number*$speaker->average_3 + $input[3])/($number+1);
		$speaker->average_4 = ($number*$speaker->average_4 + $input[4])/($number+1);
		$speaker->average_5 = ($number*$speaker->average_5 + $input[5])/($number+1);
			
		// updating the number of reviews
		$speaker->number_reviews++;
		$speaker->save();
	}
}