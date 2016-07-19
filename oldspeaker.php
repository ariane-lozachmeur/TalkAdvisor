@extends('template') @section('title') {{$speaker->speaker_name}} -
TalkAdvisor @stop @section('content')

<div class="container-fluid">
	<div class="margin">
		<div class="row firstBloc">
					<div class="col-lg-4">
						<h1 style="text-align: center">{{$speaker->speaker_name}}</h1>
						<h4 style="text-align: center">{{$speaker->speaker_englishname}}</h4>
						<div class="star-container star-container-margin">
							<input id="overall-notation" name="overall-notation"
								class="kv-ltr-theme-svg-star-display rating-loading"
								value="{{$speaker->average_5}}">
							<!-- Button to pop the modal. See at the end for the modal -->
							<button type="button" class="btn btn-default btn-margin"
								data-toggle="modal" data-target="#myModal">Rate this speaker</button>
						</div>
					</div>

					<div class="col-lg-2 col-lg-offset-1 img-container">
						<div class="ratio img-circle img-responsive img-border"
							style="background-image: url('{{$speaker->speaker_photo}}')"></div>
					</div>
					
					<div class="col-lg-4 col-lg-offset-1">
						<div class="presentation">
							{{$speaker->speaker_description}} <a class="more"
								data-toggle="modal" data-target="#modalPresentation">Read more</a>
							<p class="source">Source : Agence FrancePresse</p>
						</div>
					</div>
		</div>

		<div class="row bloc">
			<div class="col-lg-12 quote-container">
				<div class="quote">
					<!-- Quote generated by the script at the end -->
					<p id="text-quote"></p>
					<span id="quote-left"
						class="glyphicon glyphicon-chevron-left smaller"
						style="display: none"></span> <span id="quote-right"
						class="glyphicon glyphicon-chevron-right smaller"></span>
				</div>
			</div>
		</div>

		<div class="row secondBloc">
			<div class="col-lg-6 col-xs-10 blocVideo">
				<div class="embed-responsive embed-responsive-16by9">
					<iframe width="560" height="315" src="{{$speaker->video}}"
						allowfullscreen></iframe>
				</div>
			</div>

			<div class="col-lg-6 col-md-9 col-xs-10 bloc ratings-bloc">
				<h3>Ratings :</h3>

				
			<?php   $i=1; ?>
			@foreach ($options as $option)
			<div class="col-lg-6 center-text">
				<h5>{{$option->name}}</h5>
			</div>
			<div class="col-lg-6 center-text">
				<input	id="option0{{$i}}" class="kv-ltr-theme-svg-star-display rating-loading " value="2">
			</div>
			<?php  $i++; ?>			
			@endforeach
			</div>
		</div>

		<div class="row bloc">
			<div class="col-lg-12">
					<?php $i=0; ?>
					@foreach ($reviews as $review) @if($review->comment!=NULL)
					<div class="row review-container">
						<div class="col-lg-2 review-picture">
							<!-- photo of the user -->
							<img class="img-responsive img-circle"
								src="https://a2.muscache.com/im/pictures/775bef1f-405a-4dfc-8bef-2f0edf427610.jpg?aki_policy=profile_x_medium"
								alt="user" style="width: 50%">
							<p class="user-name">{{ $review->user_id }}</p>
						</div>
						<div class="col-lg-7 review-text">
							<span class="review-comment"> 
								{{ $review->comment }} 
								<a class="more" data-toggle="modal" data-target="#modalReview{{ $i }}">Read more</a>
							</span> 
							<span class="review-date"> 
								{{$review->created_at}} 
							</span>
						</div>
						<div class="col-lg-3 review-button">
							<button id="button{{$i}}" class="btn btn-default" data-toggle="modal" data-target="#modalRating{{ $i }}">See grades</button>
						</div>
						
						<!-- Modal for the ratings of each comment -->
						<div class="modal fade" id="modalRating{{ $i }}" tabindex="-1"
							role="dialog" aria-labelledby="myModalLabel2">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal"
											aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
										<h4 class="modal-title" id="myModalLabel2">Ratings of
											{{$review->user_id}}</h4>
									</div>
									<div class="modal-body">
										<?php   $j=0; ?>
										@foreach ($options as $option)
										<div class="row">
											<div class="col-lg-6 center-text-small">
												<span class="small-text">{{$option->name}}</span>
											</div>
											<div class="col-lg-6 center-text-small">
												<input	id="stars{{$i}}{{$j}}" class="kv-ltr-theme-svg-star-comment rating-loading " value="2">
											</div>
										<?php  $j++; ?>	
										</div>		
										@endforeach
									</div>
									<div class="modal-footer">
										<span class="review-date"> {{$review->created_at}} </span>
									</div>
								</div>
							</div>
						</div>
						<!-- End of the modal -->
						
					</div>
	
					<!-- Modal for "Read more of the review" -->
					<div class="modal fade" id="modalReview{{ $i }}" tabindex="-1"
						role="dialog" aria-labelledby="myModalLabel2">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal"
										aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
									<h4 class="modal-title" id="myModalLabel2">Review of
										{{$review->user_id}}</h4>
								</div>
								<div class="modal-body">{{ $review->comment }}</div>
								<div class="modal-footer">
									<span class="review-date"> {{$review->created_at}} </span>
								</div>
							</div>
						</div>
					</div>
					<!-- End of the modal -->
					
					<?php $i++; ?>
					@endif @endforeach
			</div>
		</div>
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
			<div class="modal-footer">
			</div>
		</div>
	</div>
</div>

<!-- Modal for the ratings -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
					aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Rate
					{{$speaker->speaker_name}}</h4>
			</div>
			<div class="modal-body">
				<div id="stars">
					<div class="row">
						<div class="col-lg-6 star-container">
							<p>Content</p>
							<input id="input-content" name="input-content"
								class="kv-ltr-theme-svg-star rating-loading" value="2">
						</div>
						<div class="col-lg-6 star-container">
							<p>Easy to understand</p>
							<input id="input-underst" name="input-underst"
								class="kv-ltr-theme-svg-star rating-loading" value="2">
						</div>
						<div class="col-lg-6 star-container">
							<p>Captivating</p>
							<input id="input-captiv" name="input-captiv"
								class="kv-ltr-theme-svg-star rating-loading" value="2">
						</div>
						<div class="col-lg-6 star-container">
							<p>Inspiring</p>
							<input id="input-insp" name="input-insp"
								class="kv-ltr-theme-svg-star rating-loading" value="2">
						</div>
						<div class="col-lg-6 col-lg-offset-3 star-container">
							<p>Overall</p>
							<input id="input-overall" name="input-overall"
								class="kv-ltr-theme-svg-star rating-loading" value="2">
						</div>
					</div>
					<button class="btn btn-primary right-align" id="grades">Save grades</button>
				</div>
				<div class="row" id="text-fields" style="display: none">
					{!! Form::open(); !!}
					<!-- This div contains the grades given with the stars. They are updated with a script -->
					<div style="display: none">{!!
						Form::number('1',2,array('id'=>'grade-content')); !!} {!!
						Form::number('2',2,array('id'=>'grade-underst')); !!} {!!
						Form::number('3',2,array('id'=>'grade-captiv')); !!} {!!
						Form::number('4',2,array('id'=>'grade-insp')); !!} {!!
						Form::number('5',2,array('id'=>'grade-overall')); !!} {!!
						Form::text('id', $speaker->id ,array('id'=>'id')); !!}</div>
					<div class="col-lg-10 col-lg-offset-1 form-group">{!!
						Form::label('body', 'Your comment :') !!} {!!
						Form::textarea('body', null , array('class' => 'form-control',
						'placeholder'=>'一個好的評論，應該能夠讓人做為是否參加同一個講者未來的演講的參考。因此這個評論應該著重於同一個講者不同場演講的共通點。首要的評分關鍵是講者能夠選取適合觀眾、演講長度、公告的主題的題材的能力。更為重要的是講者在傳達時，是否有能力以清晰、有啟發性且吸引人的方式表達。如果你還是不太知道該如何撰寫你的評論，可以嘗試先以文字敘述你以上填寫評分的原因。'));
						!!}</div>
					<div class="col-lg-10 col-lg-offset-1 form-group">{!!
						Form::label('quote', 'A quote from the speech :') !!} {!!
						Form::text('quote', null , array('class' => 'form-control')); !!}
					</div>
					<div class="col-lg-10 col-lg-offset-1 form-group">
						<button class="btn btn-primary" id="show-grades">See grades</button>
						{!! Form::submit('Submit',array('class' => 'btn btn-primary btn
						col-lg-offset-10')); !!}
					</div>
					{!!Form::close(); !!}
				</div>
			</div>
			<div class="modal-footer"></div>
		</div>
	</div>	
</div>

@stop @section ('script') {{ Html::script('js/quote.js') }}

<script>

var reviews = {!!json_encode($reviews)!!};
var ratings={!! json_encode($ratings) !!};
var speaker = {!!json_encode($speaker)!!};

										
	$(function(){
		$(".review-date").text(function(){
			return moment( $(this).text() ).startOf('hour').fromNow();
			})
		});

	$(function () {
	    $(".review-comment").dotdotdot({
	        after: 'a.more',
	        callback: dotdotdotCallback,
	        watch:'window',
	    });

	    $(".presentation").dotdotdot({
	        after: 'a.more',
	        callback: dotdotdotCallback,
	        watch:'window',
	    });

	    function dotdotdotCallback(isTruncated, originalContent) {
	        if (!isTruncated) {
	            $("a", this).remove();
	        }
	    }
	});

	for (var i=0;i<reviews.length;i++){
		$("#button"+i).click(function(i){
			console.log(ratings["rat"+i+""][2].score);
			$("#stars00").val(4);
			$("#stars"+i+"1").val(ratings["rat0"][1].score);
			$("#stars"+i+"2").val(ratings["rat0"][2].score);
			$("#stars"+i+"3").val(ratings["rat0"][3].score);
			$("#stars"+i+"4").val(ratings["rat0"][4].score);
			$("#stars"+i+"5").val(ratings["rat0"][4].score); 

		});
	}
	
$(document).on('ready', function(){

	//setting up the stars on the main page
    $("#option01").val(speaker.average_1);
    $("#option02").val(speaker.average_2);
    $("#option03").val(speaker.average_3);
    $("#option04").val(speaker.average_4);
    $("#option05").val(speaker.average_5);
    $("#option06").val(speaker.average_5);
    
	//initialise the stars of the main page
    $('.kv-ltr-theme-svg-star-display').rating({
    	hoverOnClear: false,
    	min: 0, max: 5, step: 0.5, stars: 5,
        theme: 'krajee-svg',
        filledStar: '<span class="krajee-icon krajee-icon-star"></span>',
        emptyStar: '<span class="krajee-icon krajee-icon-star"></span>',
        displayOnly:true,
        size:'xs'
    });
    	
	//initialise the stars used to grade
    $('.kv-ltr-theme-svg-star').rating({
    	hoverOnClear: false,
    	min: 0, max: 5, step: 0.5, stars: 5,
        theme: 'krajee-svg',
        filledStar: '<span class="krajee-icon krajee-icon-star"></span>',
        emptyStar: '<span class="krajee-icon krajee-icon-star"></span>',
        showClear: false,
        showCaption: false,
        size:'xs'
    });
   
    $('.kv-ltr-theme-svg-star-comment').rating({
    	hoverOnClear: false,
    	min: 0, max: 5, step: 0.5, stars: 5,
        theme: 'krajee-svg',
        filledStar: '<span class="krajee-icon krajee-icon-star"></span>',
        emptyStar: '<span class="krajee-icon krajee-icon-star"></span>',
        displayOnly:true,
        size:'xxs'
    });
    

    $("#input-content").rating().on("rating.change", function(event, value, caption) {   
	   $("#grade-content").val(value); 
    }); 

    $("#input-underst").rating().on("rating.change", function(event, value, caption) {   
 	   $("#grade-underst").val(value); 
     }); 

    $("#input-captiv").rating().on("rating.change", function(event, value, caption) { 
       $("#grade-captiv").val(value); 
     }); 

    $("#input-insp").rating().on("rating.change", function(event, value, caption) {  
 	   $("#grade-insp").val(value); 
     }); 

    $("#input-overall").rating().on("rating.change", function(event, value, caption) {  
 	   $("#grade-overall").val(value); 
     });

    $("#grades").click(function(){
		$("#stars").hide();
		$("#text-fields").show();
    });

    $("#show-grades").click(function(){
		$("#stars").show();
		$("#text-fields").hide();
    });


    // initialisation of the quote container :
	var i=0;  //i will represent the id of the review containing the quote
	var j=0;  //the jth quote is displayed (we don't count the quote that are empty), this is important to know if there is still a quote to show when we go back
	var over=false;
	ans = nextQuote(reviews,i,j);
	$("#text-quote").text(ans['quote']);
	i = ans['i'];
	j = ans['j'];

	// Access to the next quote						
    $("#quote-right").click(function(){
    	ans = nextQuote(reviews,i,j);
    	$("#text-quote").text(ans['quote']);
    	i = ans['i'];
    	j=ans['j'];
    	if (j==1){						// there is no quote "on the left"
			$("#quote-left").hide();
        }
		if (j==2){						// there is now one quote that we can go back to
			$("#quote-left").show();
        }
    	console.log(i,j);
    });
    
	// Acces to the previous quote
    $("#quote-left").click(function(){
    	ans = previousQuote(reviews,i,j);
    	$("#text-quote").text(ans['quote']);
    	i = ans['i'];
    	j = ans['j'];
    	if (j==1){						// there is no quote "on the left"
			$("#quote-left").hide();
        }
    	console.log(i,j);
    });
});

	

</script>


@stop
