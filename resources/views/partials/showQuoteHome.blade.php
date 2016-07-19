<?php $i=0; ?>
@foreach($quotes as $quote)
<div class="row">
	<div class="col-md-12 quote-home">
	@if ($i%2==0)
		<div class="col-md-2 col-sm-3" id="speaker{{$i}}">
			<div class="review-picture">
				<!-- photo of the speaker -->
				<img class="img-responsive img-circle"
					src="{{$quote['photo']}}" alt="speaker">
			</div>
		</div>
		<div class="col-md-10 col-sm-9">
			<div class="bubble center">
				<p class="quote">" {{$quote['quote']}} "</p></br>
				 <a class="user-name" href="speaker/{{$quote['id']}}">
				 	{{$quote['name']}}
				 </a>
			</div>
		</div>
	@else
		<div class="col-md-10 col-sm-9">
			<div class="bubble-left center">
				<p class="quote">" {{$quote['quote']}} "</p></br>
				<a class="user-name" href="speaker/{{$quote['id']}}">
					{{$quote['name']}}
				</a>
			</div>
		</div>
		<div class="col-md-2 col-sm-3" id="speaker{{$i}}">
			<div class="review-picture">
				<!-- photo of the speaker -->
				<img class="img-responsive img-circle"
					src="{{$quote['photo']}}" alt="speaker">
			</div>
		</div>
	@endif
	</div>
</div>
<?php $i++; ?>
@endforeach