
<div class="col-md-12" id="reviews">
	<?php $i=0; ?>
	@foreach ($commentReviews as $review)
	<div class="row review-container">
		<div class="col-sm-2 review-picture">
			<!-- photo of the user -->
			<img class="img-responsive img-circle"
				src="https://a2.muscache.com/im/pictures/775bef1f-405a-4dfc-8bef-2f0edf427610.jpg?aki_policy=profile_x_medium"
				alt="user" style="width: 50%">
			<p class="user-name">{{ $review->user_id }}</p>
		</div>
		<div class="col-sm-7 review-text">
			<span class="review-comment"> <input id=<?php echo "overallStar$i"?>
				class="kv-ltr-theme-svg-star-overall rating-loading " value="2"> {{
				$review->comment }} <a class="more" data-toggle="modal"
				data-target="#modalReview" data-review=<?php echo $i ?>>Read more</a>
			</span> <span class="review-date">
				{{$review->created_at->diffForHumans()}} </span>
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
<div style="text-align:center"> {!! $commentReviews->render() !!} </div>
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
