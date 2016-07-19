<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Ratings;
use App\Review;

class RatingsController extends Controller
{
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($input,$review_id)
    {
        for ($i=1;$i<=5;$i++){
    		$ratings = new Ratings;
    		$ratings->review_id=$review_id;
    		$ratings->ratingoption_id=$i;
    		$ratings->score=$input[$i];
    		$ratings->save();
    	}
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
        // TODO
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // TODO
    }
    
    public function getRatings($id){
		$ratings = Review::find($id)->ratings()->get();
		return $ratings;
    }
}
