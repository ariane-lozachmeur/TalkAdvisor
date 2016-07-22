
<div class="col-md-12" id="reviews">
	<?php $i=0; ?>
	@foreach ($reviews as $review)

	<div class="row review-container">
		<div class="col-sm-2 hidden-xs review-picture">
			<!-- photo of the user -->
			<a href='/laravel5/public/user/{{$users["$i"]->id}}'>
			<img class="img-responsive img-circle" style="width:80%"
				src="/laravel5/public/images/default.png"
				alt="user">
			</a>
		</div>
		<div class="col-sm-7 review-text">
			<span class="review-comment">
			@if ($page==='home')
			<h4 class="media-heading">Comment of {{$users["$i"]->name}} on {{$speakers["$i"]->speaker_name}}</h4>
			@else @if ($page==='speaker')
			<h4 class="media-heading">Comment of {{$users["$i"]->name}}</h4>
			@else
			<h4 class="media-heading">Comment on {{$speakers["$i"]->speaker_name}}</h4>
			@endif
			@endif
			
				<input id=<?php echo "overallStar$i"?> 
						class="kv-ltr-theme-svg-star-overall rating-loading" value="2"> 
				<p style="display:inline">{{$review->comment}}</p> 
				<a class="more" data-toggle="modal" data-target="#modalReview" 
					data-review=<?php echo $i ?>>Read more</a>
			</span> 
			<span class="review-date">
				{{$review->created_at->diffForHumans()}} 
			</span>
		</div>
		<div class="col-sm-3 review-button">
			<button class="btn btn-default" data-toggle="modal"
				data-target="#modalRating" data-rating=<?php echo $i ?>>See grades</button>
		</div>
	</div>					
	<?php $i++; ?>
	@endforeach
</div>

<!-- If we are not in the homepage, we use pagination -->
@if ($page != 'home')
<div style="text-align:center"> {!! $reviews->render() !!} </div>
@endif

<!-- Modal for "Read more of the review" -->
<div class="modal fade" id="modalReview" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
					aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel2"></h4>
			</div>
			<div class="modal-body">Comment :</div>
			<div class="modal-footer">
				<span class="review-date"></span>
			</div>
		</div>
	</div>
</div>
<!-- End of the modal -->

<!-- Modal for the ratings of each comment -->
<div class="modal fade" id="modalRating" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel2">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
					aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel2"></h4>
			</div>
			<div class="modal-body">
						<?php   $j=1; ?>
						@foreach ($options as $option)
						<div class="row">
					<div class="col-lg-6 center-text-small">
						<span class="small-text">{{$option->name}}</span>
					</div>
					<div class="col-lg-3 center-text-small">
						<input id="stars{{$j}}"
							class="kv-ltr-theme-svg-star-comment rating-loading " value="2">
					</div>
						<?php  $j++; ?>	
						</div>
				@endforeach
			</div>
			<div class="modal-footer">
				<span class="review-date"></span>
			</div>
		</div>
	</div>
</div>
<!-- End of the modal -->
