<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ratings extends Model
{
	protected $table ="review_ratingoption";
	
	public function review(){
		return $this->belongsTo('App\Review');
	}
}
