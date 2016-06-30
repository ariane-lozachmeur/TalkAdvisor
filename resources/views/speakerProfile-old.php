@extends('template') 

@section('title') 

{{$speaker->speaker_name}} - TalkAdvisor

@stop

@section('content')

<div class="container-fluid">
   <div class="margin">
	<div class="row firstBloc">
		<div class="col-lg-3 column">
			<img class="col-lg-12 hidden-xs" src="https://az796311.vo.msecnd.net/userupload/e59adf1212334ef09cea4f05faac0ab3.jpg" alt="$name TalkAdvisor" />
		</div>
		<div class="col-lg-9 col-md-8" style="padding-bottom:40px; background: #fff">
			<h1 style="text-align: center">{{$speaker->speaker_name}}</h1>
			<center>
				<input id="overall-notation" name="overall-notation"
					class="kv-ltr-theme-svg-star-display rating-loading" value="{{$speaker->average_5}}" dir="ltr"
					data-size="xs">
				<!-- Button to pop the modal. See at the end for the modal -->
				<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">
  					Rate this speaker
				</button>
			</center>
			<div class="col-lg-10 col-lg-offset-1" style="margin-top: 15px">
				<div class="col-lg-3 col-xs-4 sticker">Biotechnologies</div>
				<div class="col-lg-3 col-xs-4 sticker">Arts</div>
				<div class="col-lg-3 col-xs-4 sticker">Informatique</div>
				<div class="col-lg-3 col-xs-4 sticker">Genetique</div>
				<div class="col-lg-3 col-xs-4 sticker">Chirurgie</div>
			</div>
			<div class="col-lg-10 col-lg-offset-1">
				<div class="presentation">
					{{$speaker->speaker_description}}

					
					<p class="source">Source : Agence FrancePresse</p>
				</div>
			</div>
		</div>		
	</div>

	<div class="row bloc">
		<div class="col-lg-10 quote-container">
			<div class="quote">
				<p> We know what we are, but know not what may be </p>
				<p> William Shakespeare </p>
			</div>
			
		</div>
	
	<!--  	<div class="col-lg-2"></div>
		<div class="col-xs-10 col-xs-offset-1 col-lg-8 " id="slider-wrapper">
			<div
				class="col-lg-offset-2 col-xs-10 col-xs-offset-1 col-lg-8 inner-wrapper "
				style="margin-top: 20px">
				<input checked type="radio" name="slide" class="control" id="Slide1" />
				<label for="Slide1" id="s1"></label> <input type="radio"
					name="slide" class="control" id="Slide2" /> <label for="Slide2"
					id="s2"></label> <input type="radio" name="slide" class="control"
					id="Slide3" /> <label for="Slide3" id="s3"></label>
				<div class="overflow-wrapper">
					<div class="slide">
						<p>"We know what we are, but know not what may be"</p>
					</div>
					<div class="slide">
						<p>"Better three hours to soon than three minutes too late"</p>
					</div>
					<div class="slide">
						<p>"It is not in the stars to hold our destiny but in ourselves"</p>
					</div>
				</div>
			</div>
		</div> -->
	</div>

	<div class="row bloc">
		<div class="col-lg-6 col-xs-10 blocVideo">
			<div class="embed-responsive embed-responsive-16by9">
				<iframe width="560" height="315"
					src="{{$speaker->video}}" allowfullscreen></iframe>
			</div>
		</div>

		<div class="col-lg-6 col-md-9 col-xs-10">
			<h3>Ratings :</h3>
			<div class="col-lg-6 center-text">
				<h5>Overall</h5>
			</div>
			<div class="col-lg-6 center-text">
				<input id="display-1" name="display-1"
					class="kv-ltr-theme-svg-star-display rating-loading" value="{{$speaker->average_5}}" dir="ltr"
					data-size="xs">
			</div>
			<div class="col-lg-6 center-text">
				<h5>Content</h5>
			</div>
			<div class="col-lg-6 center-text">
				<input id="display-2" name="display-2"
					class="kv-ltr-theme-svg-star-display rating-loading" value="{{$speaker->average_1}}" dir="ltr"
					data-size="xs">
			</div>
			<div class="col-lg-6 center-text">
				<h5>Easy to understand</h5>
			</div>
			<div class="col-lg-6 center-text">
				<input id="display-3" name="display-3"
					class="kv-ltr-theme-svg-star-display rating-loading" value="{{$speaker->average_2}}" dir="ltr"
					data-size="xs">
			</div>
			<div class="col-lg-6 center-text">
				<h5>Captivating</h5>
			</div>
			<div class="col-lg-6 center-text">
				<input id="display-4" name="display-4"
					class="kv-ltr-theme-svg-star-display rating-loading" value="{{$speaker->average_3}}" dir="ltr"
					data-size="xs">
			</div>
			<div class="col-lg-6 center-text">
				<h5>Inspiring</h5>
			</div>
			<div class="col-lg-6 center-text">
				<input id="display-5" name="display-5"
					class="kv-ltr-theme-svg-star-display rating-loading" value="{{$speaker->average_4}}" dir="ltr"
					data-size="xs">
			</div>
		</div>
	</div>
	
	<div class="row bloc">
		<div class="col-lg-10">
			@foreach ($reviews as $review)
				<div class ="row review-container">
					<div class="col-lg-3 review-picture"> <!-- photo of the user -->
						<img class="img-responsive img-circle" src="https://a2.muscache.com/im/pictures/775bef1f-405a-4dfc-8bef-2f0edf427610.jpg?aki_policy=profile_x_medium" alt="user" style="width:50%">	
						<p class="user-name">{{ $review->user_name }}</p>
					</div>
					<div class="col-lg-9 review-text">
					<p>{{ $review->comment }}</p>
					<p> {{ $review->created_at }}</p>
					</div>
					
				</div>
			@endforeach
		</div>
	</div>
  </div>
</div>



<!-- Modal for the ratings -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Rate {{$speaker->speaker_name}}</h4>
      </div>
      <div class="modal-body">
        	<div class="row"">
		        <center><div class="col-lg-6">
					<p>Content</p>
					<input id="input-content" name="input-content"
						class="kv-ltr-theme-svg-star rating-loading" value= "2" dir="ltr"
						data-size="xs">
				</div>
				<div class="col-lg-6">
					<p>Easy to understand</p>
					<input id="input-underst" name="input-underst"
						class="kv-ltr-theme-svg-star rating-loading" value="2" dir="ltr"
						data-size="xs">
				</div>
				<div class="col-lg-6">
					<p>Captivating</p>
					<input id="input-captiv" name="input-captiv"
						class="kv-ltr-theme-svg-star rating-loading" value="2" dir="ltr"
						data-size="xs">
				</div>
				<div class="col-lg-6">
					<p>Inspiring</p>
					<input id="input-insp" name="input-insp"
						class="kv-ltr-theme-svg-star rating-loading" value="2" dir="ltr"
						data-size="xs">
				</div>
				<div class="col-lg-6 col-lg-offset-3">
					<p>Overall</p>
					<input id="input-overall" name="input-overall"
						class="kv-ltr-theme-svg-star rating-loading" value="2" dir="ltr"
						data-size="xs">
				</div></center>
			</div>
			<div class="row">
			{!! Form::open(); !!}
			<!-- This div contains the grades given with the stars. They are updated with a script -->
				<div style="display:none">
					{!! Form::label('1') !!} 
					{!! Form::number('1',2,array('id'=>'grade-content')); !!}
					{!! Form::label('2') !!} 
					{!! Form::number('2',2,array('id'=>'grade-underst')); !!}
					{!! Form::label('3') !!} 
					{!! Form::number('3',2,array('id'=>'grade-captiv')); !!}
					{!! Form::label('4') !!} 
					{!! Form::number('4',2,array('id'=>'grade-insp')); !!}
					{!! Form::label('5') !!} 
					{!! Form::number('5',2,array('id'=>'grade-overall')); !!}
					{!! Form::label('id') !!} 
					{!! Form::text('id', $speaker->id ,array('id'=>'id')); !!}
				</div>
				<div class="col-lg-10 col-lg-offset-1 form-group" id='before-that'>
					{!! Form::label('body', 'Your comment :') !!} 
					{!! Form::textarea('body', null , array('class' => 'form-control')); !!}
					{!! $errors->first('body', '<small class="help-block">:message</small>') !!}
				</div>
				<div class="col-lg-10 col-lg-offset-1 form-group">
					{!! Form::label('quote', 'A quote from the speach :') !!} 
					{!! Form::text('quote', null , array('class' => 'form-control')); !!}
					{!! $errors->first('quote', '<small class="help-block">:message</small>') !!}
				</div>
				<div class="col-lg-10 col-lg-offset-1 form-group">
				{!! Form::submit('Submit',array('class' => 'btn btn-primary btn col-lg-offset-10')); !!}
				</div>
				
				
			{!!Form::close(); !!}
			</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

	
	@stop 
	
	@section ('script')

	<script>
$(document).on('ready', function(){
    $('.kv-ltr-theme-svg-star-display').rating({
    	hoverOnClear: false,
    	min: 0, max: 5, step: 0.5, stars: 5,
        theme: 'krajee-svg',
        starCaptions: {1: 'Very Poor', 2: 'Poor', 3: 'Ok', 4: 'Good', 5: 'Very Good'},
        filledStar: '<span class="krajee-icon krajee-icon-star"></span>',
        emptyStar: '<span class="krajee-icon krajee-icon-star"></span>',
        showClear: false,
        showCaption: false,
        displayOnly:true,
        size:'xs'
    });

    $('.kv-ltr-theme-svg-star').rating({
    	hoverOnClear: false,
    	min: 0, max: 5, step: 0.5, stars: 5,
        theme: 'krajee-svg',
        starCaptions: {1: 'Very Poor', 2: 'Poor', 3: 'Ok', 4: 'Good', 5: 'Very Good'},
        filledStar: '<span class="krajee-icon krajee-icon-star"></span>',
        emptyStar: '<span class="krajee-icon krajee-icon-star"></span>',
        showClear: false,
        showCaption: false,
        size:'xs'
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
    });

</script>


	@stop