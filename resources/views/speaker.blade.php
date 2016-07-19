@extends('template') @section('title') {{$speaker->speaker_name}} -
TalkAdvisor @stop @section('content')

		@if ($speaker->number_reviews===null)
			<div class="alert alert-perso alert-info alert-success alert-important">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				This speaker has no review yet. Be the first to grade him or her!
			</div>
		@endif

<div class="container-fluid">
	<div class="margin">
	
		<div class="row firstBloc">
			<div class="col-md-4">
				<h1 class="center ">{{$speaker->speaker_name}}</h1>
				<h4 class="center">{{$speaker->speaker_englishname}}</h4>
				<div class="star-container star-container-margin">
					<input id="overall-notation" name="overall-notation"
						class="{{$speaker->number_reviews===null ? 'kv-ltr-theme-svg-star-disabled' : 'kv-ltr-theme-svg-star-display'}} rating-loading"
						value="{{$speaker->average_1}}">
				
					<!-- Button to pop the modal. See at the end for the modal -->
					<button type="button" class="btn btn-default btn-margin"
						data-toggle="modal" data-target="#myModal">Rate this speaker</button>
						
				</div>
			</div>

			<div class="col-md-2 col-md-offset-1 col-sm-4 img-container">
				<div class="ratio img-circle img-responsive"
					style="background-image: url('{{$speaker->speaker_photo}}')"></div>
			</div>

			<div class="col-md-4 col-md-offset-1">
				<div class="presentation">
					{{$speaker->speaker_description}} <a class="more"
						data-toggle="modal" data-target="#modalPresentation">Read more</a>
					<p class="source">Source : Agence FrancePresse</p>
				</div>
			</div>
		</div>

		@unless ($quotes->isEmpty())
			@include('partials.showQuote')
		@endunless
		
		<div class="row secondBloc">
			
			@unless ($speaker->video===null)
			<div class="col-md-6 col-sm-12 blocVideo">
				<div class="embed-responsive embed-responsive-16by9">
					<iframe width="560" height="315" src="{{$speaker->video}}"
						allowfullscreen></iframe>
				</div>
			</div>
			@else
			<div class="col-md-6 col-sm-12 bloc">
				<div class="video-form-container">
				{{ Form::open() }}    			
					<div class="col-lg-10">               
	    				{{ Form::label('video','Upload a video of this speaker !',array('class'=>'video-label'))}} 
	    			</div>
					<div class="col-lg-10">               
	    				{{ Form::text('video',null,array('class'=>'form-control','placeholder'=>'Example : https://www.youtube.com/watch?v=HUmX6CiMoFk'))}}  
	    			</div>
	    			<div class="col-lg-2">
	    				{{ Form::submit('Upload', array('class'=>'btn btn-primary')) }}
	    			</div>
				{{ Form::close() }}	
				</div>
			</div>
			@endunless

			<div class="col-md-6 col-sm-12 bloc ratings-bloc">
			<?php   $i=1; ?>
			@foreach ($options as $option)
			<div class="col-md-2 col-sm-2 center-text">
				<h5>{{$option->name}}</h5>
			</div>
			<div class="col-md-4 col-sm-4 center-text">
				<span class="glyphicon glyphicon-info-sign info" data-container="body" data-toggle="tooltip" data-placement="right" title="{{$option->description}}"></span>
			</div>
				<div class="col-md-6 col-sm-6 center-text">
				
					<input id="option{{$i}}"
						class="{{$speaker->number_reviews===null ? 'kv-ltr-theme-svg-star-disabled' : 'kv-ltr-theme-svg-star-display'}} rating-loading " value="2">
				</div>
			<?php  $i++; ?>			
			@endforeach
			</div>
		</div>
		
		@unless($commentReviews->isEmpty())
		<div class="row bloc">
			@include('partials.showReviews')
		</div>
		@endunless

	</div>
</div>

<!-- Modal for the presentation -->
<div class="modal fade" id="modalPresentation" tabindex="-1"
	role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
					aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">{{$speaker->speaker_name}}</h4>
			</div>
			<div class="modal-body">{{$speaker->speaker_description}}</div>
			<div class="modal-footer"></div>
		</div>
	</div>
</div>

<!-- Modal used to rate -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			@include('partials.ratingForm');	
		</div>
	</div>
</div>
<!-- End of the modal -->

@stop @section ('script') {{ Html::script('js/quote.js') }}

<script>

var commentReviews = {!!json_encode($commentReviews)!!};
var quotes = {!! json_encode($quotes)!!};
var ratings= {!! json_encode($ratings) !!};
var speaker = {!!json_encode($speaker)!!};

$("#grades").click(function(){
	$("#stars").hide();
	$("#text-fields").show();
});

$("#show-grades").click(function(){
	$("#stars").show();
	$("#text-fields").hide();
});

// TODO : this is supposed to allow to change the grades. But it closes the modal for some reason
/* $("#show-grades").click(function(){
	$("#stars").show();
	$("#text-fields").hide();
}); */

// TODO :  Infinite scroll plugin. It works, we just have to find a way to load the newReviews 
// and ratings to show the read more and the grades.
/* $('#reviews').infinitescroll({

	 navSelector  : "ul.pagination",            
	                // selector for the paged navigation (it will be hidden)
	 nextSelector : "ul.pagination li a",    
	                // selector for the NEXT link (to page 2)
	 itemSelector : "#reviews div.review-container"  ,        
	                // selector for all items you'll retrieve
	 loadingText  : "Loading new reviews...", 
	 donetext     : "You have seen all the reviews on this speaker" ,
}); */

	
$(document).on('ready', function(){

	// initialize the tooltips 
	$('[data-toggle="tooltip"]').tooltip()

	//setting up the good value for the stars on the main page
    $("#option1").val(speaker.average_1);
    $("#option2").val(speaker.average_2);
    $("#option3").val(speaker.average_3);
    $("#option4").val(speaker.average_4);
    $("#option5").val(speaker.average_5);

  //initialise the stars of the main page
    $('.kv-ltr-theme-svg-star-display').rating({
    	min: 0, max: 5, step: 0.5, stars: 5,
        theme: 'krajee-svg',
        filledStar: '<span class="krajee-icon krajee-icon-star"></span>',
        emptyStar: '<span class="krajee-icon krajee-icon-star"></span>',
        displayOnly:true,
        size:'xs'
    });
    	
	//initialise the stars used to grade
    $('.kv-ltr-theme-svg-star').rating({
    	min: 0, max: 5, step: 0.5, stars: 5,
        theme: 'krajee-svg',
        filledStar: '<span class="krajee-icon krajee-icon-star"></span>',
        emptyStar: '<span class="krajee-icon krajee-icon-star"></span>',
        showClear: false,
        showCaption: false,
        size:'xs'
    });

	//initialise the disabled stars (when there is no reviews yet)
    $('.kv-ltr-theme-svg-star-disabled').rating({
	    theme: 'krajee-svg',
	    filledStar: '<span class="krajee-icon krajee-icon-star"></span>',
	    emptyStar: '<span class="krajee-icon krajee-icon-star disabled-stars"></span>',
	  	displayOnly:true,
	    size:'xs'
	  });
    
	// Updates the value of the fields "grades" of the form when stars are clicked
	$("#input1").rating().on("rating.change", function(event, value, caption) {  
		$("#1").val(value); 
	}); 

    $("#input2").rating().on("rating.change", function(event, value, caption) {   
 	   $("#2").val(value); 
     }); 

    $("#input3").rating().on("rating.change", function(event, value, caption) { 
       $("#3").val(value); 
     }); 

    $("#input4").rating().on("rating.change", function(event, value, caption) {  
 	   $("#4").val(value); 
     }); 

    $("#input5").rating().on("rating.change", function(event, value, caption) {  
 	   $("#5").val(value); 
     });

});

</script>

{{Html::script('js/read_more.js')}}
{{Html::script('js/quote-carousel.js')}}
{{Html::script('js/stars.js')}}

@stop