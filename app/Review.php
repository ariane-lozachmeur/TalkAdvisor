<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model{
    
	protected $table ="reviews";
	
	protected $fillable =[
		'comment',
		'quote',
		'talk_id',
		'user_id',
		'speaker_id',
	];
	
	public function speaker(){
		return $this->belongsTo('App\Speaker');
	}
	
	public function user(){
		return $this->belongsTo('App\User');
	}
	
	public function ratings(){
		return $this->hasMany('App\Ratings');
	}
}
