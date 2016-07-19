@extends('template') @section('title') TalkAdvisor @stop

@section('header') {{ Html::style('css/navbar-home.css') }} {{
Html::style('css/homepage.css') }} @stop @section('homePagePhoto')

<div class="row">
	<div class="col-lg-12" id="bg" style="padding-bottom: 100px">
		<h1 class="talkadvisor">TalkAdvisor</h1>
		<h2 class="subtitle">For better talks</h2>
		<div id="search-container">
			<div id="search-bg"></div>
			<div id="search">
			{{Form::open(array('url'=>'search','class'=>'form-home','role'=>'search'))}}
					<div class="form-group" id="the-basics">
					{{Form::text('name',null,array('class'=>'form-control-home typeahead','placeholder'=>'Find a speaker'))}}
					</div>
					<button type="submit" class="button-perso" style="border: 0; background: transparent">
						<img src="http://localhost/laravel5/public/images/loupe.png"
							width="30" height="30" alt="submit" />
					</button>
			{{Form::close()}}
			</div>
		</div>
		@if(Session::has('search_error'))
			<div class="alert alert-important alert-danger alert-search">
				<button type="button" class="close" data-dismiss="alert"
					aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				{{ Session::get('search_error') }}
			</div>
		@endif
	</div>
</div>
@stop
@section('content')
<div class="container-fluid">
	<div class="margin">
		<div class="row speakers">
			<h3 class="center">Hall Of Fame</h3>
			{{-- */$i=0;/* --}} <!-- This is juste a way to use the variable $i without printing it -->
			@foreach ($bestspeakers as $speaker)
			{{-- */$i++;/* --}}
			<div class="col-md-2 col-sm-3" id="speaker{{$i}}">
				<div class="review-picture">
					<!-- photo of the user -->
					<img class="img-responsive img-circle"
						src="{{$speaker->speaker_photo}}" alt="speaker"> <a
						class="user-name" href="speaker/{{$speaker->id}}">{{
						$speaker->speaker_name }}</a> <input
						class="kv-ltr-theme-svg-star-overall rating-loading "
						value="{{$speaker->average_1}}">
				</div>
			</div>
			@endforeach
		</div>
		<div class="row">
			<h3 class="center">Quotes of the day</h3>
			@include('partials.showQuoteHome')
		</div>
		<div class="row bloc">
			<h3 class="center">Last reviews</h3>
			@include('partials.showReviews')
		</div>
	</div>
</div>



@stop @section('script')

<script>

var commentReviews = {!!json_encode($commentReviews)!!};
var ratings= {!! json_encode($ratings) !!};
var quotes = {!!json_encode($quotes)!!};
var speakers = {!!json_encode($speakers)!!};

$(window).scroll(function() {
    var height = $(window).scrollTop();
    
    if(height < 500) {
    	$("#navbar").addClass("navbar-home");
        $("#navbar").removeClass("navbar-default");
    }
    
    if(height  > 500) {
        $("#navbar").addClass("navbar-default");
        $("#navbar").removeClass("navbar-home");
    }
   
}); 

if(screen.width<1100){
	$("#speaker5").hide();
	$("#speaker6").hide();
	
}

</script>

{{Html::script('js/read_more.js')}}
{{Html::script('js/stars.js')}}
{{ Html::script('js/autocompletion.js') }} 


@stop
