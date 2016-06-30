<?php
namespace App\Http\Controllers;

use View;
use Session;
use Illuminate\Http\Request;
use App\Speaker;
use App\Http\Controllers\Controller;
use App\Http\Requests\SpeakerFormRequest;

class SpeakerController extends Controller
{
    public function index()
    {
        $speakers = Speaker::all();
        return $speakers;
    }
    
    public function getSpeaker($id)
    {
        $speaker = Speaker::findOrFail($id);
        return $speaker;
    }
    
    public function getBest($number){
    	$speakers=Speaker::orderBy('average_5','desc')->take($number)->get();
    	return $speakers;
    }
}