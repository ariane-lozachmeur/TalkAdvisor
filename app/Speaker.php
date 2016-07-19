<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Speaker extends Model
{

	protected $table ="speakers";
	
	protected $fillable =[
	'video',
	];
	
	public function reviews(){
		return $this->hasMany('App\Review');
	}
	
}

