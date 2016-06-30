@extends('template-home') 

@section('title') TalkAdvisor 

@stop

@section('header') 

{{ Html::style('css/mycss/navbar-home.css') }} 
{{ Html::style('css/mycss/homepage.css') }}

@stop 

@section('content')

<div class="row">
	<div class="col-lg-12" id="bg" style="padding-bottom: 100px">
		<h1 class="talkadvisor">TalkAdvisor</h1>
		<h2 class="subtitle">For better talks</h2> 
		<div id="search-container">
			<div id="search-bg"></div>
			<div id="search">
				<form class="form-home"  role="search">
					<div class="form-group" id="the-basics">
						<input type="text" class="form-control-home typeahead"
							placeholder="Search for a speaker">
					</div>
					<button type="submit" class="button-perso"
						style="border: 0; background: transparent">
						<img src="http://localhost/laravel5/public/images/loupe.png"
							width="30" height="30" alt="submit" />
					</button>
				
				</form>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid margin">
	<div class="row">
		<div class="col-lg-6 bloc left">
			<h3>Best Speakers :</h3>
			@foreach ($bestspeakers as $speaker)
				<div class ="row review-container">
					<div class="col-lg-3 col-sm-3 review-picture"> <!-- photo of the user -->
						<img class="img-responsive img-circle" src="https://a2.muscache.com/im/pictures/775bef1f-405a-4dfc-8bef-2f0edf427610.jpg?aki_policy=profile_x_medium" alt="user" style="width:50%">	
						<a class="user-name" href="speakerProfile/{{$speaker->id}}">{{ $speaker->speaker_name }}</a>
					</div>
					<div class="col-lg-9 col-sm-9 review-text">
					<p>{{ $speaker->speaker_description }}</p>
					<p> {{ $speaker->speaker_company }}</p>
					</div>
					
				</div>
			@endforeach

		</div>
	
		<div class="col-lg-6 bloc right">
			<h3>Last reviews :</h3>
			@foreach ($reviews as $review)
				<div class ="row review-container">
					<div class="col-lg-3 col-sm-3 review-picture"> <!-- photo of the user -->
						<img class="img-responsive img-circle" src="https://a2.muscache.com/im/pictures/775bef1f-405a-4dfc-8bef-2f0edf427610.jpg?aki_policy=profile_x_medium" alt="user" style="width:50%">	
						<p class="user-name">{{ $review->user_name }}</p>
					</div>
					<div class="col-lg-9 col-sm-9 review-text">
					<p>{{ $review->comment }}</p>
					<p> {{ $review->created_at }}</p>
					</div>
					
				</div>
			@endforeach
		</div>
	</div>
</div>


@stop
