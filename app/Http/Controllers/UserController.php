<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\ratingoptions;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
  		$ratingController = new RatingsController();
        $user = User::find($id);
        $data=[];
        $data['user'] = $user;
        $data['page'] = 'user';
        $data['options'] = ratingoptions::all();
        $commentReviews = $this->getCommentsOf($id);
        $data['reviews'] = $commentReviews['reviews'];
        $data['ratings'] = $commentReviews['ratings'];
        // here users is used instead of speaker
        $data['users'] = $commentReviews['users'];
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function getCommentsOf($id) {
    	$ratingController=new RatingsController();
    
    	$reviews = User::find ($id)->reviews()->where ( 'comment', '!=', "" )->latest ( 'created_at' )->paginate(5);
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
 
}
