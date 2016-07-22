@extends('template') @section('title') {{$user->name}} - Profile @stop

@section ('header') {{Html::style('css/user.css')}} @stop

@section('content')

<div class="container-fluid">
	<div class="margin">
		<div class="row bloc user-bloc">
			<div class="col-md-4 col-sm-4">
						<h4 class="user-title">
							Who is {{$user->name}} ?
						</h4>
						<div class="first user-credit">
							<i class="fa fa-users fa-margin" aria-hidden="true"></i>
							<p class="inline-block">Became a member {{$user->created_at->diffForHumans()}}</p>			
						</div>
						<div class="user-credit">
							<i class="fa fa-check fa-margin" aria-hidden="true"></i>
							<p class="inline-block">Verified user</p>
						</div>
						<div class="user-credit">
							<i class="fa fa-pencil-square-o fa-margin" aria-hidden="true"></i>
							<p class="inline-block">Wrote ... reviews</p>
						</div>
						<div class="user-credit">
							<i class="fa fa-star fa-margin" aria-hidden="true"></i>
							<p class="inline-block">Gave ... ratings</p>
						</div>
						<div class="user-credit">
							<i class="fa fa-comment fa-margin" aria-hidden="true"></i>
							<p class="inline-block">Quoted ... speakers</p>
						</div>

			</div>
			<div class="col-md-4 center">
				<div class="col-md-8 col-md-offset-2">
					<img class="img-circle img-responsive"
						src="{{$user->profile_picture}}">
					<h1>{{$user->name}}</h1>
				</div>

			</div>
			<div class="col-md-4">
				<h4 class="user-title">How does {{$user->name}} rates ?</h4>
				<div class="user-ratings">
				<?php   $i=1; ?>
				@foreach ($options as $option)
				<div class="row">
						<div class="col-md-4 col-sm-4" style="width: 90px;">
							<h5>{{$option->name}}</h5>
						</div>
						<div class="col-md-2 col-sm-2">
							<span class="fa fa-info-circle fa-lg info" data-container="body"
								data-toggle="tooltip" data-placement="right"
								title="{{$option->description}}"></span>
						</div>
						<div class="col-md-6 col-sm-6">
							<input id="option{{$i}}"
								class="{{$user->number_reviews===null ? 'kv-ltr-theme-svg-star-disabled' : 'kv-ltr-theme-svg-star-display'}} rating-loading "
								value="2">
						</div>
					</div>
				<?php  $i++; ?>			
				@endforeach
				</div>
			</div>
		</div>
		<div class="row bloc">
		@include('partials.showReviews')
		</div>
	</div>

	@stop @section('script')
		
	<script>

	var reviews = {!!json_encode($reviews)!!};
	var ratings= {!! json_encode($ratings) !!};
	
//setting up the good value for the stars on the main page
    $("#option1").val(3);
    $("#option2").val(3);
    $("#option3").val(3);
    $("#option4").val(4);
    $("#option5").val(5);

    //initialise the stars of the main page
    $('.kv-ltr-theme-svg-star-display').rating({
    	min: 0, max: 5, step: 0.5, stars: 5,
        theme: 'krajee-svg',
        filledStar: '<span class="krajee-icon krajee-icon-star"></span>',
        emptyStar: '<span class="krajee-icon krajee-icon-star"></span>',
        displayOnly:true,
        size:'lg'
    });

	//initialise the disabled stars (when there is no reviews yet)
    $('.kv-ltr-theme-svg-star-disabled').rating({
	    theme: 'krajee-svg',
	    filledStar: '<span class="krajee-icon krajee-icon-star"></span>',
	    emptyStar: '<span class="krajee-icon krajee-icon-star disabled-stars"></span>',
	  	displayOnly:true,
	    size:'lg'
	  });

</script>
	
		{{Html::script('js/showReviews.js')}}
	
	@stop