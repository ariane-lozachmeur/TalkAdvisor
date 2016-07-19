<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model{
    
	protected $table ="reviews";
	
	protected $fillable =[
		'comment',
		'quote',
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
